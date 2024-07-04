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
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Inertia\Response
    {
        $projects = Project::all();
        return Inertia::render('Dashboard/Projects/index', [
            'projects' => ProjectResource::collection($projects)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Dashboard/Projects/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->id();

        if ($image = $request->file('thumb_image')) {
            $destPath = 'storage/projects'. '/' . $data['slug'] ;
            $profImage = date('Ymd'). '_' . $data['slug'] . '.' . $image->getClientOriginalExtension();
            $image->move($destPath, $profImage);
            $pathUrl = '/' .$destPath. '/' .$profImage;
            $data['thumb_image'] = $pathUrl;
        }

        Project::create($data);

        return redirect()->route('admin.project.index')->with('success', 'Проект успешно добавлен в базу данных.');
    }



    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $project = Project::where('slug', $slug)->first();

        return Inertia::render('Dashboard/Projects/show', [
            'project' => new ProjectResource($project),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return Inertia::render('Dashboard/Projects/edit', [
            'project' => new ProjectResource($project),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Project $project)
    {
        $project->update($request->validated());
        return redirect()->route('admin.project.index')->with('success', 'Проект успешно изменен.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('admin.project.index')->with('success', 'Проект успешно удален.');
    }
}
