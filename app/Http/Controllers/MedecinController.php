<?php

namespace App\Http\Controllers;

use App\Models\Medecin;
use App\Models\TypeMedecin;
use Illuminate\Http\Request;

class MedecinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patients = Medecin::all();
        $type_medecins = TypeMedecin::all();
        return view('medecin.index', compact('patients'), compact('type_medecins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $type_medecins = TypeMedecin::all();
        return view('medecin.create', compact('type_medecins'));
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
            'typeMedecin_id'=>'required',
            'nomMedecin'=>'required',
            ]);

        $patient = new Medecin([
            'nomMedecin' => $request->get('nomMedecin'),
            'typeMedecin_id' => $request->get('typeMedecin_id'),
            ]);
        $patient->save();
        return redirect('/medecin')->with('success', 'medecin créé!');
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
        $patient = Medecin::find($id);
        $type_medecins = TypeMedecin::all();
        return view('medecin.edit', compact('patient'), compact('type_medecins'));
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
            'nomMedecin'=>'required',
            'typeMedecin_id'=>'required',
            ]);

        $patient = Medecin::find($id);
        $patient->nomMedecin = $request->get('nomMedecin');
        $patient->typeMedecin_id = $request->get('typeMedecin_id');
        $patient->save();
        return redirect('/medecin')->with('success', 'medecin mis à jour!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $patient = Medecin::find($id);
        $patient->delete();
        return redirect('/medecin')->with('success', 'Medecin supprimé!');
    }
}
