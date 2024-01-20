<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Technology;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();
        return view('admin.projects.index',compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $technologies = Technology::all();
        return view('admin.projects.create',compact('categories','technologies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        $data = $request->validated();
        //$slug = Str::slug($data['title'],'-');
        $userId = auth()->id(); // or Auth::id();
        $data['slug'] =Project::getSlug($data['title']) ;
        $data['user_id'] = $userId;
        if($request->hasFile('image')){
            $path = Storage::put('images',$request->image);
            $data['image'] = $path;
        }
        $project = Project::create($data);
        if ($request->has('technologies')) {
            $project->technologies()->attach($request->technologies);
        }
        return redirect()->route('admin.projects.show', $project->slug);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('admin.projects.show',compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $categories = Category::all();
        $technologies = Technology::all();
        return view('admin.projects.edit',compact('project','categories','technologies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $data = $request->validated();
        $slug = Str::slug($data['title'],'-');
        $data['user_id'] = $project->user_id;
        if($project->title !== $data['title']){
            $data['slug'] = Project::getSlug($data['title']);
        }
        if($request->hasFile('image')){
            if($project->image){
                Storage::delete($project->image);
            }
            $path = Storage::put('images',$request->image);
            $data['image'] = $path;
        }
        $project->update($data);
        if ($request->has('technologies')) {
            $project->technologies()->sync($request->technologies);
        } else {
            $project->technologies()->detach();
        }
        return redirect()->route('admin.projects.show', $project->slug);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        if($project->image){
            Storage::delete($project->image);
        }
        $project->delete();
        return to_route('admin.projects.index')->with('msg',"$project->title è stato eliminato");
    }
}
