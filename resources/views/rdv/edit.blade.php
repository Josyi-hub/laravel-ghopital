@extends('base')

@section('main')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Mis à jour Rendez-vous</h1>

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
    <form method="post" action="{{ route('rdv.update', $patient->id) }}">
        @method('PATCH')
        @csrf
        <div class="form-group">
           <label for="medecin_id">Spécialité:</label>
           <select id="medecin_id" class="form-control" name="medecin_id" >
               <option value="{{$patient->medecin_id}}">{{$patient->medecin->type_medecin->nomType}}</option>
               @foreach($type_medecins as $type_medecin)
                   <option value="{{$type_medecin->id}}">{{$type_medecin->nomType}}</option>
               @endforeach
           </select>
        </div>

        <div class="form-group">
            <label for="dateRDV">Date du rendez-vous:</label>
            <input type="date" class="form-control" value="{{$patient->dateRDV}}" name="dateRDV"/>
        </div>

        <button type="submit" class="btn btn-primary-outline">Mettre à jour</button>
    </form>
</div>
</div>
</div>
@endsection
