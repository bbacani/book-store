<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class LocaleController extends Controller
{
    public function changeLocale(Request $request)
    {
        $locale = $request->input('locale');
        if (! in_array($locale, ['en', 'es', 'hr'])) {
            abort(400);
        }

        Session::put('locale', $locale);

        App::setLocale($locale);

        return Redirect::back();
    }
}
