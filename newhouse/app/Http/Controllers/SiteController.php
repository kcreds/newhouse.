<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Immovables;
use App\Models\Tidings;

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
        $immovables = Immovables::find($slug);
        $immovables = Immovables::where('slug', $slug)->firstOrFail();
        return view('property', ['immovable' => $immovables]);

        if (!$immovables) {
            abort(404);
        }
    }
    public function login()
    {
        return view('login');
    }
}
