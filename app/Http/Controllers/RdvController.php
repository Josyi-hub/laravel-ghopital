<?php

namespace App\Http\Controllers;

use App\Models\RDV;
use App\Models\TypeMedecin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RdvController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $type_medecins = TypeMedecin::all();
        $patients = RDV::all();
        return view('rdv.index', compact('patients'), compact('type_medecins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $type_medecins = TypeMedecin::all();
        return view('rdv.create', compact('type_medecins'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'patient_id'=>'required',
            'medecin_id'=>'required',
            'dateRDV'=>'required',
            ]);

        $numPatient = request('numPatient');
        $resultat = Auth::loginUsingId($numPatient);
        if ($resultat)
        {
            $patient = new RDV([
                'patient_id' => $request->get('patient_id'),
                'medecin_id' => $request->get('medecin_id'),
                'dateRDV' => $request->get('dateRDV')
                ]);
            $patient->save();
            return redirect('/')->with('success', 'Rendez-vous créé!', compact('resultat'));
        }

        return redirect('/')->withErrors('verifiez votre numero patient');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $patient = RDV::find($id);
        $type_medecins = TypeMedecin::all();
        return view('rdv.edit', compact('patient'), compact('type_medecins'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'medecin_id'=>'required',
            'dateRDV'=>'required'
            ]);

        $patient = RDV::find($id);
        $patient->medecin_id = $request->get('medecin_id');
        $patient->dateRDV = $request->get('dateRDV');
        $patient->save();
        return redirect('/rdv')->with('success', 'Rendez-vous mis à jour!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $patient = RDV::find($id);
        $patient->delete();
        return redirect('/rdv')->with('success', 'Rendez-vous supprimé!');
    }
}
