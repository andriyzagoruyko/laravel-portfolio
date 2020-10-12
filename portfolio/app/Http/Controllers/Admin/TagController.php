<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tag;
use App\Http\Requests\TagRequest;
use App\Classes\EditingLocalization;
use App\Http\Controllers\Controller;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::all();
        return view('auth.tags.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $locale = EditingLocalization::getCurrentLocale();
        return view('auth.tags.form', compact('locale'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\TagRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TagRequest $request)
    {
        $tag = Tag::create($request->only('slug'));
        $locales = EditingLocalization::getSupportedLocales();
        

        foreach ($locales as $code => $locale) {
            $tag->localizations()
                ->create($request->except('slug') + ['lang' => $code]);
        }

        return redirect()->route('tags.index')->with([
            'flash_message' => 'Тег успішно додано',
            'flash_message_type' => 'success'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        $locale = EditingLocalization::getCurrentLocale();
        $localization = $tag->localizations()->where('lang', $locale)->first();

        if (is_null($localization)) {
            $localization = $tag->localizations()->create(['lang' => $locale]);
        }

        return view('auth.tags.form', compact('tag', 'localization', 'locale'));    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\TagRequest   $request
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(TagRequest $request, Tag $tag)
    {
        $tag->update($request->only('slug'));
        $localization = $tag->localizations()->where('lang', $request->lang)->firstOrFail();
        $localization->update($request->except('slug'));

        return redirect()->route('tags.edit', $tag->id)->with([
            'flash_message' => 'Тег збережено',
            'flash_message_type' => 'success'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();

        return redirect()->route('tags.index')->with([
            'flash_message' => 'Тег видалений',
            'flash_message_type' => 'danger'
        ]);
    }
}
