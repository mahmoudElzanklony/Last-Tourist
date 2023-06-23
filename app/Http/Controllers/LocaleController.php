<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;

class LocaleController extends Controller
{
    public function setLocale($locale)
    {
        App::setLocale($locale);
        // dd(app()->getLocale());
        session()->put('locale', $locale);   
        $previousUrl = URL::previous();
        return redirect($previousUrl);
    }
}