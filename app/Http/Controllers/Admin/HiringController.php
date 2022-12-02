<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Enrollment;
use App\Models\Hiring_jobs;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class HiringController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $hiring = Hiring_jobs::with('role', 'company')->latest()->paginate(3);

        $enrollment = Enrollment::with('company', 'hiring', 'role')->get();
        $company = Company::all();
        $role = Role::all();

        if ($company_slug = $request->company) {
            // return $company_slug;
            $company = Company::where('slug', $company_slug)->get();
            if (!$company) {
                return redirect()->back()->with('error', "Company doesn't have.");
            }
        }

        if ($role_slug = $request->role) {
            $role = Role::where('slug', $role_slug)->get();
            if (!$role) {
                return redirect()->back()->with('error', "Role doesn't have.");
            }
        }

        return view('Admin.hiring.index', compact('hiring', 'enrollment', 'company', 'role'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role = Role::all();
        $company = Company::all();

        return view('Admin.hiring.create', compact('role', 'company'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'role' => 'required',
            'requirement' => 'required',
            'interview_date' => 'required',
            'deadline' => 'required',
            'company' => 'required'
        ]);

        $role_id = Role::where('slug', $request->role)->first()->id;
        $company_id = Company::where('slug', $request->company)->first()->id;

        Hiring_jobs::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name) . uniqid(),
            'description' => $request->description,
            'role_id' => $role_id,
            'requirement' => $request->requirement,
            'company_id' => $company_id,
            'interview_date' => $request->interview_date,
            'deadline' => $request->deadline
        ]);

        return redirect(route('hiring.index'))->with('success', 'Job posted successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
