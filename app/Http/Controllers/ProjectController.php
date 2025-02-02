<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    public function index()
    {
        if(Auth::user()->hasRole('admin')){
            $results = Project::orderBy('id', 'desc')->get();
        }else{
            $results = Project::where('user_id', Auth::id())->orderBy('id', 'desc')->get();
        }
        $assistants = User::with(['roles'])->wherehas('roles', function($q){
            $q->where('name', 'assistant');
        })->get();
        return view('admin.project.index', compact('results', 'assistants'));
    }

    public function create()
    {
        return view('admin.project.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'   => 'required|string|max:255',
            'details' => 'required|string',
            'funding' => 'required|numeric',
            'status'  => 'required|in:ongoing,completed',
        ]);

        $project          = new Project();
        $project->user_id = Auth::id();
        $project->title   = $request->title;
        $project->details = $request->details;
        $project->funding = $request->funding;
        $project->status  = $request->status;
        $project->save();


        return redirect()->route('projects.index')->with('msg', 'Project created successfully');
    }

    public function edit($id)
    {
        $result = Project::findOrFail($id);
        return view('admin.project.edit', compact('result'));
    }



    public function update(Request $request, $id)
    {
        $request->validate([
            'title'   => 'required|string|max:255',
            'details' => 'required|string',
            'funding' => 'required|numeric',
            'status'  => 'nullable|in:ongoing,completed',
        ]);

        $project          = Project::findOrFail($id);
        $project->title   = $request->title;
        $project->details = $request->details;
        $project->funding = $request->funding;

        if($request->status){
            $project->status  = $request->status;
        }else{
            $project->status  = $project->status;
        }

        $project->save();

        return redirect()->route('projects.index')->with('msg', 'Project updated successfully');
    }

    public function destroy($id)
    {
        $project = Project::findOrFail($id);
        $project->delete();

        return redirect()->route('projects.index')->with('msg', 'Project deleted successfully');
    }

    public function changeStatus($id, $status)
    {
        $project = Project::findOrFail($id);
        $project->status = $status;
        $project->save();

        return redirect()->route('projects.index')->with('msg', 'Project status changed successfully');
    }

    public function assignUser(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required|array',
            'user_id.*' => 'required|exists:users,id',
        ]);


            $project = Project::findOrFail($id);
            $project->projectAssistants()->sync($request->user_id);

        return redirect()->route('projects.index')->with('msg', 'Assistant assigned successfully');
    }
}
