@extends('base')

@section('main')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Mis à jour Medecin</h1>

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
    <form method="post" action="{{ route('medecin.update', $patient->id) }}">
        @method('PATCH')
        @csrf
        <div class="form-group">
            <label for="nomMedecin">Nom:</label>
            <input value="{{$patient->nomMedecin}}" type="text" class="form-control" name="nomMedecin"/>
        </div>

        <div class="form-group">
            <label for="typeMedecin_id">Spécialité:</label>
            <select id="typeMedecin_id" class="form-control" name="typeMedecin_id" >
                @foreach($type_medecins as $type_medecin)
                        @if($patient->typeMedecin_id==$type_medecin->id)
                        <option value="{{$type_medecin->id}}">{{$type_medecin->nomType}}</option>
                        @endif
                @endforeach
                @foreach($type_medecins as $type_medecin)
                    <option value="{{$type_medecin->id}}">{{$type_medecin->nomType}}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary-outline">Mettre à jour</button>
    </form>
</div>
</div>
</div>
@endsection
