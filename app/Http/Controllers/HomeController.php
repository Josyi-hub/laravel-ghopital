<?php

namespace App\Http\Controllers;

use App\Models\TypeMedecin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $resultat = 0;
        if (Auth::check())
        {
            $resultat = Auth::user();
        }
        return view('welcome', compact('type_medecins'), compact('resultat') );
    }
}
