<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tag;
use App\Models\Project;
use App\Models\Technology;
use App\Classes\EditingLocalization;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectRequest;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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
        $technologies = Technology::all();

        return view('auth.projects.form', compact('locale', 'tags', 'technologies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\ProjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectRequest $request)
    {
        $project = Project::create($request->only('slug', 'link', 'tag_id'));
        $project->technologies()->attach($request->technology_ids);

        if($request->hasFile('image') && $request->file('image')->isValid()) {
            $project->addMediaFromRequest('image')->toMediaCollection('images');
        }

        $locales = EditingLocalization::getSupportedLocales();
        
        foreach ($locales as $code => $locale) {
            $project->localizations()
                ->create($request->except('slug', 'link', 'tag_id') + ['lang' => $code]);
        }
        
        return redirect()->route('projects.edit', $project->id)->with([
            'flash_message' => 'Проект успішно додано',
            'flash_message_type' => 'success'
        ]);    
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
        $tags = Tag::all();
        $technologies = Technology::all();
        $localization = $project->localizations()->where('lang', $locale)->first();

        if (is_null($localization)) {
            $localization = $project->localizations()->create(['lang' => $locale]);
        }

        return view('auth.projects.form', compact('project', 'localization', 'locale', 'tags', 'technologies'));
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

        $project->update($request->only('slug', 'link', 'tag_id'));
        $project->technologies()->sync($request->technology_ids);
        $localization->update($request->except('slug', 'link', 'tag_id'));

        return redirect()->route('projects.edit', $project->id)->with([
            'flash_message' => 'Проект збережно',
            'flash_message_type' => 'success'
        ]); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->technologies()->detach();
        $project->delete();

        return redirect()->route('projects.index')->with([
            'flash_message' => 'Проект видалено',
            'flash_message_type' => 'danger'
        ]);
    }
}
