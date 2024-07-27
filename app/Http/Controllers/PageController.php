<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class PageController extends Controller
{
    public function showCorrectHomePage(): View
    {
        if (auth()->check())
        {
            return view('home.profile');
        }

        else
        {
            return view('home.welcome');
        }
    }
}