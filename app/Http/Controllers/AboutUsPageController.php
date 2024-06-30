<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class AboutUsPageController extends Controller
{
    public function index()
    {

        return Inertia::render('AboutUs/Index');
    }
}
