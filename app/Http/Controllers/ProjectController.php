<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();
        return view('index',compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // D'abord on valide les données
        $request->validate([
            'name' => 'required',
            'description' =>'required',
            'customer' => 'required',
            'cost' => 'required',
        ]);

        // Et puis on enregistre dans la base de données
        Project::create($request->all());

        // Et redirige l'utilisateur vers la page index avec un message
        return redirect()->route('projects.index')->with('info','Le projet a été bien enregistré.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('show',compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return view('edit',compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        
        // D'abord on valide les données
        $request->validate([
            'name' => 'required',
            'description' =>'required',
            'customer' => 'required',
        ]);

        // Et puis on enregistre dans la base de données
        $project->update($request->all());

        // Et redirige l'utilisateur vers la page index avec un message
        return redirect()->route('projects.index')->with('info','Les modification sont bien enrégistées.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return back()->with('info','Le projet a été bien supprimé de la base de données');

    }
}
