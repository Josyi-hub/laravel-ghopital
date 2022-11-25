<?php

namespace App\Http\Controllers;

use App\Models\TypeMedecin;
use Illuminate\Http\Request;

class TypeMedecinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patients = TypeMedecin::all();
        return view('type_medecin.index', compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('type_medecin.create');
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
            'nomType'=>'required',
            ]);

        $patient = new TypeMedecin([
            'nomType' => $request->get('nomType'),
            ]);
        $patient->save();
        return redirect('/type_medecin')->with('success', 'type_medecin créé!');
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
        $patient = TypeMedecin::find($id);
        return view('type_medecin.edit', compact('patient'));
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
            'nomType'=>'required',
            ]);

        $patient = TypeMedecin::find($id);
        $patient->nomType = $request->get('nomType');
        $patient->save();
        return redirect('/type_medecin')->with('success', 'type_medecin mis à jour!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $patient = TypeMedecin::find($id);
        $patient->delete();
        return redirect('/type_medecin')->with('success', 'type_medecin supprimé!');
    }
}
