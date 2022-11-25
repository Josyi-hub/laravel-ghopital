@extends('base')

@section('main')
<div class="row">
    <div class="col-sm-12">
        @if(session()->get('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
        @endif
        <h1 class="display-3">Medecins</h1>
        <div>
            <a style="margin: 19px;" href="{{ route('medecin.create')}}" class="btn btn-primary">Nouveau medecin</a>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Nom</td>
                    <td>Spécialité</td>
                    <td>Actions</td>
                </tr>
            </thead>
            <tbody>
                @foreach($patients as $patient)
                <tr>
                    <td>{{$patient->id}}</td>
                    <td>{{$patient->nomMedecin}}</td>
                    
                    @foreach($type_medecins as $type_medecin)
                        @if($patient->typeMedecin_id==$type_medecin->id)
                            <td>{{$type_medecin->nomType}}</td>
                        @endif
                    @endforeach
                    <td>
                        <a href="{{ route('medecin.edit',$patient->id)}}" class="btn btn-primary">Editer</a>
                    </td>
                    <td>
                        <form action="{{ route('medecin.destroy', $patient->id)}}" method="post">
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
