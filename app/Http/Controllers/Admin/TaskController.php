<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Middleware\Employee;
use App\Models\Company;
use App\Models\Employee as ModelsEmployee;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::with('company', 'employee')->get();

        return view('Admin.task.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $company = Company::all();

        return view('Admin.task.create', compact('company'));
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
            'deadline' => 'required',
            'company' => 'required'
        ]);

        Task::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name) . uniqid(),
            'description' => $request->description,
            'company_id' => Company::where('slug', $request->company)->first()->id,
            'deadline' => $request->deadline
        ]);

        return redirect()->back()->with('success', 'Task added successfully.');
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
        $task = Task::where('slug', $id)->first();
        $employee = ModelsEmployee::where('company_id', $task->company_id)->get();

        return view('Admin.task.edit', compact('task', 'employee'));
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
        $task = Task::where('slug', $id);
        if (!$task) {
            return redirect()->back()->with('error', 'Task not found.');
        }

        $task->delete();

        return redirect('/admin/task')->with('success', 'Task deleted successfuly.');
    }
}
