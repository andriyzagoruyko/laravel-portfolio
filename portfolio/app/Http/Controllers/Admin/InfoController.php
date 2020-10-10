<?php

namespace App\Http\Controllers\Admin;

use App\Models\Info;
use Illuminate\Http\Request;
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
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Info  $info
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Info $info)
    {
        $localization = $info->localizations()->where('lang', $request->lang)->firstOrFail();
        $localization->update($request->all());

        if($request->hasFile('photo') && $request->file('photo')->isValid()) {
            $info->clearMediaCollection('photos');
            $info->addMediaFromRequest('photo')->toMediaCollection('photo');
        }

        return redirect()->route('info.index');    
    }
}
