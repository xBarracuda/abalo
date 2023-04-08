<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function show(Request $request)
    {
        return view('about');
    }
}
