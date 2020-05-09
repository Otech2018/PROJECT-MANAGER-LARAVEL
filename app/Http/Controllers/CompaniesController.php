<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Company;
class CompaniesController extends Controller
{


      public function __construct()
        {
            $this->middleware('auth');
        }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        //list all company
        $companies = Company::where('user_id', auth()->user()->id)->get();
      //  $companies = Company::find();
      
        return view('companies.index',['companies'=>$companies]);
     
      return redirect('/login');
       
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
        $this->validate($request, [
            'name'=>'required',
            'description'=>'required'
        ]);


        $company =new Company;
        $company->name= $request->input('name');
        $company->description= $request->input('description');
        $company->user_id = auth()->user()->id;
       
        $company->save();
        return redirect('/companies')->with('success','Company Created Successfully!');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
      //
        $company = Company::find($company->id);
    //  $company = Company::where('id', $company->id)->first();
        return view('companies.show',['company'=>$company]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        $company = Company::find($company->id);
        return view('companies.edit',['company'=>$company]);
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
        /*
        //save Data
        $companyUpdate = Company::where('id', $company->id)
                    ->update([
                        'name'=> $request->input('name'),
                        'description' => $request->input('description')
                    ]);
        if($companyUpdate){
            return redirect()->route('companies.show',['company'->$company->id])->with('success','Company Updated Successfully');
        }
        //redirect
        return back()->withInput();
          **/

          $this->validate($request, [
            'name'=>'required',
            'description'=>'required'
        ]);


        $company = Company::find($company->id);
        $company->name= $request->input('name');
        $company->description= $request->input('description');
        
        $company->save();
        return redirect('/companies/'.$company->id)->with('success','Company Updated Successfully!');
        
    }

  

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        //
       // dd($company);
       $company = Company::find($company->id);
       $company->delete();
       return redirect('/companies')->with('success','Company Deleted!');
    }
}
