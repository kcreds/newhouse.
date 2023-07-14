<?php

namespace App\Http\Controllers;

use App\Models\immovablesTemplate;
use Illuminate\Http\Request;
use App\Models\Immovables;
use App\Models\Tidings;
use View;

class SiteController extends Controller
{

    public function home()
    {
        $immovable = new Immovables();
        return view('index', ['immovable' => $immovable]);
    }

    public function search()
    {
        $immovable = new Immovables();
        return view('search', ['immovable' => $immovable]);
    }

    public function property($slug)
    {
        $immovable = Immovables::where('slug', $slug)->firstOrFail();

        if (!$immovable) {
            abort(404);
        }

        if (View::exists('templates.custom_template')) {
            return view('templates.custom_template', ['immovable' => $immovable]);
        }else
            return view('property', ['immovable' => $immovable]);
    }
    public function login()
    {
        return view('login');
    }
}