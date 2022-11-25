@extends('base')

@section('main')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Mis à jour Patient</h1>

        @if ($errors->any())
        <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    <br />
    @endif
    <form method="post" action="{{ route('patients.update', $patient->id) }}">
        @method('PATCH')
        @csrf
        <div class="form-group">
            <label for="nomPatient">Nom:</label>
            <input value="{{$patient->nomPatient}}" type="text" class="form-control" name="nomPatient"/>
        </div>
        <div class="form-group">
            <label for="prenomPatient">Prénom:</label>
            <input value="{{$patient->prenomPatient}}" type="text" class="form-control" name="prenomPatient"/>
        </div>

        <button type="submit" class="btn btn-primary-outline">Mettre à jour</button>
    </form>
</div>
</div>
</div>
@endsection
