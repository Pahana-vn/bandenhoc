<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutusController extends Controller
{
    function aboutus()
    {
        return view('frontend.pages.aboutus');
    }
}