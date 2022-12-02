<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return 'hello';
        $company = Company::all();

        return view('Admin.company.index', compact('company'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.company.create');
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
            'address' => 'required',
            // 'website' => ''
            'email' => 'required|email'
        ]);

        Company::create([
            'name' => $request->name,
            'description' => $request->description,
            'slug' => Str::slug($request->name) . uniqid(),
            'address' => $request->address,
            'website' => $request->website,
            'email' => $request->email
        ]);

        return redirect()->back()->with('success', 'Added company to company list successfully');
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
        $company = Company::where('slug', $id)->first();

        if (!$company) {
            return redirect()->back()->with('error', 'Not Found.');
        }

        return view('Admin.company.edit', compact('company'));
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
        $company = Company::where('slug', $id);

        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'address' => 'required',
            'email' => 'required|email'
        ]);

        $slug = Str::slug($request->name) . uniqid();

        $company->update([
            'name' => $request->name,
            'description' => $request->description,
            'slug' => $slug,
            'address' => $request->address,
            'website' => $request->website,
            'email' => $request->email
        ]);

        // $company = $company->first();

        return redirect(route('company.edit', $slug))->with('success', 'Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $c = Company::where('slug', $id);

        if (!$c->first()) {
            return redirect()->back()->with('erro', 'Company Not Found');
        }

        $c->delete();

        return redirect()->back()->with('success', 'Company deleted from list');
    }

    public function moreDetail($slug)
    {
        return $slug;
    }
}
