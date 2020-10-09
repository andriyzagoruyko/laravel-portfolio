<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tag;
use App\Models\Project;
use App\Classes\EditingLocalization;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectRequest;
use Illuminate\Support\Facades\Route;

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
        return view('auth.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $locale = EditingLocalization::getCurrentLocale();
        $tags = Tag::all();
        return view('auth.projects.form', compact('locale', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\ProjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectRequest $request)
    {
        $project = Project::create([
            'slug' => $request->slug,
            'link' => $request->link,
            'tag_id' => $request->tag_id,
        ]);

        if($request->hasFile('image') && $request->file('image')->isValid()) {
            $project->addMediaFromRequest('image')->toMediaCollection('images');
        }

        $params = $request->except('image', 'slug', 'link');
        $project->localizations()->create($params);

        return redirect()->route('projects.edit', $project->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return redirect()->route('projects.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $locale = EditingLocalization::getCurrentLocale();
        $localization = $project->localizations()->where('lang', $locale)->first();
        $tags = Tag::all();

        if (is_null($localization)) {
            $localization = $project->localizations()->create(['lang' => $locale]);
        }

        return view('auth.projects.form', compact('project', 'localization', 'locale', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\ProjectRequest  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(ProjectRequest $request, Project $project)
    {
        $localization = $project->localizations()->where('lang', $request->lang)->firstOrFail();
        
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $project->clearMediaCollection('images');
            $project->addMediaFromRequest('image')->toMediaCollection('images');
        }

        $project->update($request->all());
        $localization->update($request->all());

        return redirect()->route('projects.edit', $project->id);
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
        return redirect()->route('projects.index');
    }
}
