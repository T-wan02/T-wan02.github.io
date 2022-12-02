<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Enrollment;
use App\Models\Interview;
use App\Models\Quitted_emplyees;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PageController extends Controller
{
    public function home()
    {
        // return view('Admin.master');
        return redirect('/admin/company');
    }

    public function enrollmentDetail($slug)
    {
        $enrollmentProfile = Enrollment::where('slug', $slug)->with('role', 'company')->first();

        return view('Admin.Components.enrollmentDetail', compact('enrollmentProfile'));
    }

    public function postStatus($slug, Request $request)
    {
        $enrollment = Enrollment::where('slug', $slug);
        $enrollment_person = Enrollment::where('slug', $slug)->first();

        $enrollment->update([
            'status' => $request->status
        ]);

        if ($delInter = Interview::where('status', 'pending')->orWhere('status', 'reject')) {
            foreach ($delInter->get() as $di) {
                $di->delete();
            }
        }

        if ($request->status === 'interview') {
            Interview::create([
                'name' => $enrollment_person->name,
                'slug' => Str::slug($enrollment_person->name) . uniqid(),
                'email' => $enrollment_person->email,
                'resume' => $enrollment_person->resume,
                'role_id' => $enrollment_person->role_id,
                'company_id' => $enrollment_person->company_id,
                'enrollment_id' => $enrollment_person->id,
                'status' => $enrollment_person->status
            ]);
        }

        return redirect()->back()->with('success', 'Status changed to ' . $request->status . ' successfully.');
    }

    public function interview(Request $request)
    {
        $interview = Interview::with('role', 'enrollment', 'company')->get();

        if ($request->result) {
            $interview = Interview::where('result', $request->result)->with('role', 'enrollment', 'company')->get();
        }

        if ($request->result == 'all') {
            $interview = Interview::with('role', 'enrollment', 'company')->get();
        }

        return view('Admin.Components.interview', compact('interview'));
    }

    public function taskDetail($slug, Request $request)
    {
        $detail = Task::where('slug', $slug)->with('company')->first();

        if (!$detail) {
            return redirect()->back()->with('error', 'Task not found');
        }

        return view('Admin.Components.taskDetail', compact('detail'));
    }

    public function interviewDetail($slug)
    {
        $interview = Interview::where('slug', $slug)->with('company', 'enrollment', 'role')->first();

        return view('Admin.Components.interviewDetail', compact('interview'));
    }

    public function postResult($slug, Request $request)
    {
        $interview = Interview::where('slug', $slug);

        $interview->update([
            'result' => $request->result
        ]);

        return redirect('/admin/interview')->with('success', 'Updated stage successfully.');
    }

    public function setSalary($slug, Request $request)
    {
        $update_interview = Interview::where('slug', $slug);
        $interview = Interview::where('slug', $slug)->with('company', 'enrollment', 'role')->first();

        $update_interview->update([
            'salary' => $request->salary
        ]);

        // return $interview;
        // return view('Admin.Components.interviewDetail', compact('interview'));
        return redirect()->back()->with('success', 'Set salary successfully.', ['interview', $interview]);
    }

    public function showResign()
    {
        $resign = Quitted_emplyees::with('employee', 'company')->get();

        return view('Admin.Components.resign', compact('resign'));
    }

    public function resignDetail($slug, Request $request)
    {
        $resign = Quitted_emplyees::where('slug', $slug)->with('employee', 'company')->first();

        return view('Admin.Components.resignDetail', compact('resign'));
    }

    public function submitResign($slug, Request $request)
    {
        $resign = Quitted_emplyees::where('slug', $slug);

        $resign->update([
            'desicion' => $request->desicion,
            'pending_time' => $request->pending_time,
            'pending_reason' => $request->pending_reason
        ]);

        return redirect('/admin/resign')->with('success', 'Analyzed resign form successfully.');
    }
}
