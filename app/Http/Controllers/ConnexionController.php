<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ConnexionController extends Controller
{
    public function formulaire()
    {
        return view('Connexion');

    }
    public function traitement()
    {
        request()->validate([
            'numPatient' => ['required'],
        ]);


        $numPatient = request('numPatient');

        $resultat = Auth::loginUsingId($numPatient);

        return Auth::id();

    }
}
