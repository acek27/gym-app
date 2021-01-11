<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class LeadController extends Controller
{
    protected function create()
    {
        return Inertia::render('Leads/LeadAdd');
    }

}
