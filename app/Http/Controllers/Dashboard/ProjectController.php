<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProjectResource;
use App\Models\Project;
use App\Models\Tool;
use App\Models\Category;
use App\Models\Image;
use App\Models\Client;
use Illuminate\Http\Request;
use App\Http\Requests\Project\UpdateRequest;
use App\Http\Requests\Project\StoreRequest;
use Inertia\Inertia;




class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();
        return Inertia::render('dashboard/projects/index', [
            'projects' => ProjectResource::collection($projects)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('dashboard/projects/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $project = Project::create($request->validated());
        return redirect()->route('dashboard.projects.index')->with('success', 'Проект успешно добавлен в базу данных.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return Inertia::render('dashboard/projects/show', [
            'project' => new ProjectResource($project),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return Inertia::render('dashboard/projects/edit', [
            'project' => new ProjectResource($project),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Project $project)
    {
        $project->update($request->validated());
        return redirect()->route('dashboard.projects.index')->with('success', 'Проект успешно изменен.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('dashboard.projects.index')->with('success', 'Проект успешно удален.');
    }
}
