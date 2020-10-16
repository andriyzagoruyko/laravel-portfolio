<?php

namespace App\Http\Controllers\Admin;

use App\Models\Info;
use App\Http\Requests\InfoRequest;
use App\Classes\EditingLocalization;
use App\Http\Controllers\Controller;

class InfoController extends Controller
{
    /**
     * Display an information editing form.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $locale = EditingLocalization::getCurrentLocale();
        $info = Info::get()->first();
        $localization = $info->localizations()->where('lang', $locale)->first();

        if (is_null($localization)) {
            $localization = $info->localizations()->create(['lang' => $locale]);
        }

        return view('auth.info.form', compact('info', 'locale', 'localization'));    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\InfoRequest  $request
     * @param  \App\Models\Info  $info
     * @return \Illuminate\Http\Response
     */
    public function update(InfoRequest $request, Info $info)
    {
        $info->update($request->input('social'));

        $localization = $info->localizations()->where('lang', $request->lang)->firstOrFail();
        $localization->update($request->all());

        if($request->hasFile('photo') && $request->file('photo')->isValid()) {
            $info->clearMediaCollection('images');
            $info->addMediaFromRequest('photo')->toMediaCollection('images');
        }

        return redirect()->route('info.index')->with([
            'flash_message' => 'Інформація збережена',
            'flash_message_type' => 'success'
        ]);    
    }
}
