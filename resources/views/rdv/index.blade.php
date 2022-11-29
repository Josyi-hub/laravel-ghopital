@extends('base')

@section('main')
<div class="row">
    <div class="col-sm-12">
        @if(session()->get('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
        @endif
        <h1 class="display-3">Rendez-vous</h1>
        <div>
            <a style="margin: 19px;" href="{{ route('rdv.create')}}" class="btn btn-primary">Nouveau Rendez-vous</a>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <td>ID Patient</td>
                    <td>Nom </td>
                    <td>Medecin</td>
                    <td>Specialité</td>
                    <td>Date Rendez-vous</td>
                    <td>Actions</td>
                </tr>
            </thead>
            <tbody>
                @foreach($patients as $patient)
                <tr>
                    <td>{{$patient->patient_id}}</td>
                    <td>{{$patient->patient->nomPatient}} {{$patient->patient->prenomPatient}}</td>
                    <td>{{$patient->medecin->nomMedecin}}</td>
                    <td>{{$patient->medecin->type_medecin->nomType}}</td>
                    <td>{{$patient->dateRDV}}</td>
                    @foreach($type_medecins as $type_medecin)
                        @if($patient->typeMedecin_id==$type_medecin->id)
                            <td>{{$type_medecin->nomType}}</td>
                        @endif
                    @endforeach
                    <td>
                        <a href="{{ route('rdv.edit',$patient->id)}}" class="btn btn-primary">Editer</a>
                    </td>
                    <td>
                        <form action="{{ route('rdv.destroy', $patient->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    <div>
    </div>
@endsection
