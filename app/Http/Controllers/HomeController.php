<?php

namespace App\Http\Controllers;

use App\Models\TypeMedecin;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $type_medecins = TypeMedecin::all();
        return view('welcome', compact('type_medecins') );
    }
}
