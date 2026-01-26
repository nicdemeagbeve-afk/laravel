<?php

namespace App\Http\Controllers;

use App\Models\Vehicule;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $vehicules = Vehicule::all();
        return view('pages.contact', ['vehicules' => $vehicules]);
    }
}
