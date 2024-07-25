<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class PageController extends Controller
{
    public function showCorrectHomePage(): View
    {
        if (auth()->check())
        {
            return view('home-page-feed');
        } else {
            return view('home-page');
        }
    }
}