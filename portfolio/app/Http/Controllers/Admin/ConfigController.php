<?php

namespace App\Http\Controllers\Admin;

use App\Models\Config;
use App\Classes\EditingLocalization;
use App\Http\Controllers\Controller;
use App\Http\Requests\ConfigRequest;

class ConfigController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $locale = EditingLocalization::getCurrentLocale();
        $config = Config::get()->first();
        $localization = $config->localizations()->where('lang', $locale)->first();

        if (is_null($localization)) {
            $localization = $config->localizations()->create(['lang' => $locale]);
        }

        return view('auth.config.form', compact('config', 'locale', 'localization'));    
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\ConfigRequest  $request
     * @param  \App\Models\Config  $config
     * @return \Illuminate\Http\Response
     */
    public function update(ConfigRequest $request, Config $config)
    {
        $localization = $config->localizations()->where('lang', $request->lang)->firstOrFail();
        $localization->update($request->all());

        return redirect()->route('config.index')->with([
            'flash_message' => 'Конфігурація збережена',
            'flash_message_type' => 'success'
        ]); 
    }
}
