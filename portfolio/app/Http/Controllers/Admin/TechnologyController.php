<?php

namespace App\Http\Controllers\Admin;

use App\Models\Technology;
use App\Http\Controllers\Controller;
use App\Http\Requests\TechnologyRequest;

class TechnologyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $technologies = Technology::all();
        return view('auth.technologies.index', compact('technologies'));    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.technologies.form');    
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\TechnologyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TechnologyRequest $request)
    {
        $technology = Technology::create($request->all());

        if($request->hasFile('image') && $request->file('image')->isValid()) {
            $technology->addMediaFromRequest('image')->toMediaCollection('images');
        }

        return redirect()->route('technologies.index');    
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Technology  $technology
     * @return \Illuminate\Http\Response
     */
    public function edit(Technology $technology)
    {
        return view('auth.technologies.form', compact('technology'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\TechnologyRequest  $request
     * @param  \App\Models\Technology  $technology
     * @return \Illuminate\Http\Response
     */
    public function update(TechnologyRequest $request, Technology $technology)
    {
        $technology->update($request->all());

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $technology->clearMediaCollection('images');
            $technology->addMediaFromRequest('image')->toMediaCollection('images');
        }

        return redirect()->route('technologies.index');    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Technology  $technology
     * @return \Illuminate\Http\Response
     */
    public function destroy(Technology $technology)
    {
        $technology->delete();
        return redirect()->route('technologies.index');    
    }
}
