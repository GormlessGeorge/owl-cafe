<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class ContactsPageController extends Controller
{
    public function index()
    {

        return Inertia::render('Contacts/Index');
    }
}
