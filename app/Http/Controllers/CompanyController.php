<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::all();

        return view('companies.index', compact('companies'));
    }
     
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('companies.create');
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
        ]);
    
        Company::create($request->all());
     
        return redirect()->route('companies.index')
                        ->with('success','Company created successfully.');
    }
     
    /**
     * Display the specified resource.
     *
     * @return 
     */
    public function show()
    {
        //
    }



    public function showUsers(Request $request) {
        $users = User::where('company_id', null)->get();
        $companyId = $request->id;

        return view('companies.addUser', compact('users', 'companyId'));

    }

    public function addUsers(Request $request) {
        
        $input = $request->all();

        $input['id'] = $request->input('user_ids');
        $companyId = $request->company_id;

        if (!empty($input['id'])) {
            foreach($input['id'] as $id) {
                $id = (int)$id;
                $user = User::find($id);
                $user->company_id = (int)$companyId;
                $user->save();
            }
        }

        

        

    
        
    
        return redirect()->route('companies.index')
                        ->with('success','User added successfully');

    }

 
     
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        return view('companies.edit', compact('company'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        $request->validate([
            'name' => 'required',
        ]);
    
        $company->update($request->all());
    
        return redirect()->route('companies.index')
                        ->with('success','Company updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        $company->delete();
    
        return redirect()->route('companies.index')
                        ->with('success','Company deleted successfully');
    }
}
