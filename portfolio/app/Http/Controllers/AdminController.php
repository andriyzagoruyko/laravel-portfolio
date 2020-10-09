<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classes\EditingLocalization;


class AdminController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('auth.index');
    }

    /**
     * Set an editing locale.
     *
     * 
     */
    public function setEditingLocale($localeCode)
    {
        EditingLocalization::setCurrentLocale($localeCode);
        return back();;
    }
}
