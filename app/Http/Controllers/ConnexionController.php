<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\TypeMedecin;
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
            'patient_id' => ['required'],
        ]);


        $numPatient = request('patient_id');

        $resultat = Auth::loginUsingId($numPatient);

        if ($resultat){
            return redirect('/')->with('success', 'Authentification réussie');
        }

        return redirect('/')->withErrors('Operation échouez, reessayez');

    }
}
