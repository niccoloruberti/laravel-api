<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project;
use App\Models\Type;
use App\Models\Technology;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

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
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::all();
        $technologies = Technology::all();
        return view('admin.projects.create', compact('types', 'technologies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectRequest $request)
    {
        // dd($request);
        $data = $request->all();

        $project = new Project();

        $slug = $project->generateSlug($data['name']);
        $data['slug'] = $slug;

        if($data['img']) {
            $data['img'] = Storage::put('img_thumb', $data['img']);
        }

        $project->fill($data);

        $project->save();

        if($request->has('technologies')) {
            $project->technologies()->attach($request->technologies);
        }

        return redirect()->route('admin.projects.index')->with('message', 'Progetto aggiunto correttamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {

        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {   
        $types = Type::all();
        $technologies = Technology::all();

        return view('admin.projects.edit', compact('project', 'types', 'technologies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProjectRequest  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $data = $request->all();

        if($project->img && isset($data['img'])) {
            Storage::delete($project->img);
        }

        if(isset($data['img'])) {
            $data['img'] = Storage::put('img_thumb', $data['img']);
        }

        $slug = $project->generateSlug($data['name']);
        $data['slug'] = $slug;
        $project->fill($data);

        $project->update($data);

        if($request->has('technologies')) {
            $project->technologies()->sync($request->technologies);
        }

        return redirect()->route('admin.projects.index')->with('message', 'Progetto modificato correttamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        if($project->img) {
            Storage::delete($project->img);
        }

        $project->technologies()->detach();

        $project->delete();

        return redirect()->route('admin.projects.index')->with('message', 'Progetto eliminato correttamente');
    }
}
