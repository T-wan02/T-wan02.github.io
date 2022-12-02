<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Company;
use App\Models\Employee;
use App\Models\Interview;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function adminShowLogin()
    {
        return view('Admin.auth.login');
    }

    public function adminPostLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $admin = Admin::where('email', $request->email)->first();

        if (!$admin) {
            return redirect()->back()->with('error', 'Wrong Password!');
        }

        if (!Hash::check($request->password, $admin->password)) {
            return redirect()->back()->with('error', 'Wrong Password!');
        }

        auth()->login($admin);
        return redirect('/admin')->with('success', 'Login successfully. Welcome admin ' . $admin->name);
    }

    public function register($interview_slug, $company_slug, $role_slug, Request $request)
    {
        $interview = Interview::where('slug', $interview_slug)->first();
        $company = Company::where('slug', $company_slug)->first();
        $role = Role::where('slug', $role_slug)->first();

        // return $company . $role;

        return view('Employee.auth.register', compact('interview', 'company', 'role'));
    }

    public function registerEmployee($interview_slug, Request $request)
    {
        $request->validate([
            'name' => 'required',
            'profile' => 'required|mimes:png,jpg,jpeg,webp|max:2048',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'password' => 'required',
        ]);

        if ($request->password !== $request->confirm_password) {
            return redirect()->back()->with('error', 'Please type same password in both fields');
        }

        // store image
        $image = $request->file('profile');
        $image_name = $image->getClientOriginalName();
        $image->move(public_path('/images' . $image_name));

        // get company_id and role_id
        $company_id = Company::where('name', $request->company)->first()->id;
        $role_id = Role::where('name', $request->role)->first()->id;

        Employee::create([
            'name' => $request->name,
            'profile' => $request->profile,
            'slug' => Str::slug($request->name) . uniqid(),
            'phone' => $request->phone,
            'address' => $request->address,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $role_id,
            'salary' => $request->salary,
            'company_id' => $company_id,
        ]);

        $interview = Interview::where('slug', $interview_slug);
        $interview->delete();

        return redirect('/admin/interview')->with('success', 'Employee account created successfully.');
    }

    //employee login
    public function showLogin()
    {
        return view('Employee.auth.login');
    }

    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $employee = Employee::where('email', $request->email)->first();
        if (!$employee) {
            return redirect()->back()->with('error', 'User not found!');
        }

        if (!Hash::check($request->password, $employee->password)) {
            return redirect()->back()->with('error', 'Wrong password!');
        }

        auth()->login($employee);

        return redirect('/employee/task')->with('success', 'Login successfully.');
    }
}
