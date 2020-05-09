<?php

namespace App\Http\Controllers;

use App\Project;
use App\Company;
use App\User;
use App\ProjectUser;
use Illuminate\Http\Request;

class ProjectsController extends Controller
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
    
    //list all project
    $projects = Project::where('user_id', auth()->user()->id)->get();  //get() use multiple record
  //  $projects = Project::find();
  
    return view('projects.index',['projects'=>$projects]);
 
  return redirect('/login');
   
}


//add user to Project
public function adduser(Request $request)
{
     //take a project, add auser to it
     $project= Project::find($request->input('project_id'));
     if(auth()->user()->id == $project->user_id){
        $user = User::where('email', $request->input('email'))->first(); //first() use single record


        
            if($user && $project){

                        //check if user is already added to the project
                $projectUser = ProjectUser::where('user_id', $user->id)->where('project_id', $project->id)->first();
                if($projectUser){
                    //if user already Exist, exit
                    return redirect('/projects/'.$project->id)->with('error',' User is Already A Member of this Project');
                }


                

                $project->users()->attach($user->id);
                return redirect('/projects/'.$project->id)->with('success',$request->input('email').' Was Added To The Project  Successfully!');
           
           
            }
     }
     return redirect('/projects/'.$project->id)->with('error',' Error Adding user To The Project');
}
/**
 * Show the form for creating a new resource.
 *
 * @return \Illuminate\Http\Response
 */
public function create($company_id = null)
{

    $companies = null;
    if(!$company_id){
        $companies = Company::where('user_id', auth()->user()->id)->get();
    }
    return view('projects.create',['company_id'=>$company_id, 'companies'=>$companies]);
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


    $project =new project;
    $project->name= $request->input('name');
    $project->description= $request->input('description');
   $project->user_id = auth()->user()->id;
     $project->company_id= $request->input('company_id');
   
    $project->save();
    return redirect('/projects/'.$project->id)->with('success','project Created Successfully!');
    
}

/**
 * Display the specified resource.
 *
 * @param  \App\project  $project
 * @return \Illuminate\Http\Response
 */
public function show(Project $project)
{
  //
    $project = Project::find($project->id);
//  $project = Project::where('id', $project->id)->first();
    $comments =  $project->comments;
    return view('projects.show',['project'=>$project,'comments'=>$comments]);
}

/**
 * Show the form for editing the specified resource.
 *
 * @param  \App\project  $project
 * @return \Illuminate\Http\Response
 */
public function edit(Project $project)
{
    $project = Project::find($project->id);
    return view('projects.edit',['project'=>$project]);
}

/**
 * Update the specified resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @param  \App\project  $project
 * @return \Illuminate\Http\Response
 */
public function update(Request $request, Project $project)
{
    /*
    //save Data
    $projectUpdate = Project::where('id', $project->id)
                ->update([
                    'name'=> $request->input('name'),
                    'description' => $request->input('description')
                ]);
    if($projectUpdate){
        return redirect()->route('projects.show',['project'->$project->id])->with('success','project Updated Successfully');
    }
    //redirect
    return back()->withInput();
      **/

      $this->validate($request, [
        'name'=>'required',
        'description'=>'required'
    ]);


    $project = Project::find($project->id);
    $project->name= $request->input('name');
    $project->description= $request->input('description');
    
    $project->save();
    return redirect('/projects/'.$project->id)->with('success','project Updated Successfully!');
    
}



/**
 * Remove the specified resource from storage.
 *
 * @param  \App\project  $project
 * @return \Illuminate\Http\Response
 */
public function destroy(Project $project)
{
    //
   // dd($project);
   $project = Project::find($project->id);
   $project->delete();
   return redirect('/projects')->with('success','project Deleted!');
}
}
