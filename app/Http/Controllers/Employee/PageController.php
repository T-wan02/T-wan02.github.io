<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Quitted_emplyees;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;

class PageController extends Controller
{
    public function home()
    {
        $loginEmployee = auth()->user();

        // return view('Employee.index', compact('loginEmployee'));
        return redirect('/employee/task');
    }

    public function task(Request $request)
    {
        // return auth()->user();
        $loginEmployee = auth()->user();
        $task = Task::where('employee_id', $loginEmployee->id)->with('company')->get();

        $finished_task = Task::where('employee_id', auth()->user()->id)->get();

        return view('Employee.task', compact('task', 'loginEmployee', 'finished_task'));
    }

    public function profile($slug)
    {
        $profile = Employee::where('slug', $slug)->first();
        $loginEmployee = auth()->user();

        return view('Employee.profile', compact('profile', 'loginEmployee'));
    }

    public function taskDetail($slug, Request $request)
    {
        $task = Task::where('slug', $slug)->first();
        $loginEmployee = auth()->user();

        return view('Employee.taskDetail', compact('task', 'loginEmployee'));
    }

    public function startTask($slug)
    {
        $task = Task::where('slug', $slug);

        $task->update([
            'is_done' => 'on_progress',
            'is_new' => false
        ]);

        return redirect()->back()->with('success', 'Task Started');
    }

    public function changePassword($slug, Request $request)
    {
        $request->validate([
            'new_password' => 'required',
            'confirm_password' => 'required'
        ]);

        if ($request->new_password !== $request->confirm_password) {
            return redirect()->back()->with('error', 'Please enter same password in both field');
        }

        $employee = Employee::where('slug', $slug);

        $employee->update([
            'password' => Hash::make($request->new_password)
        ]);

        auth()->logout($employee->first());

        return redirect('/employee/login')->with('success', 'Changed password successfully. Please login again.');
    }

    public function resign()
    {
        $loginEmployee = auth()->user();

        return view('Employee.resign', compact('loginEmployee'));
    }

    public function postResign(Request $request)
    {
        $loginUser = auth()->user();

        Quitted_emplyees::create([
            'employee_id' => $loginUser->id,
            'slug' => Str::slug($loginUser->name) . uniqid(),
            'company_id' => $loginUser->company_id,
            'reason' => $request->reason
        ]);

        return redirect()->back()->with('success', 'Submitted resign form successfully');
    }
}
