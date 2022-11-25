@extends('base')
@section('main')
<div class="row">
<div class="col-sm-8 offset-sm-2">
 <h1 class="display-3">Ajouter une spécialité</h1>
 <div>
 @if ($errors->any())
 <div class="alert alert-danger">
 <ul>
 @foreach ($errors->all() as $error)
 <li>{{ $error }}</li>
 @endforeach
 </ul>
 </div><br />
 @endif
 <form method="post" action="{{ route('type_medecin.store') }}">
 @csrf
 <div class="form-group">
 <label for="nomType">Nom:</label>
 <input type="text" class="form-control" name="nomType"/>
 </div>

 <button type="submit" class="btn btn-primary-outline">Ajouter Spécialité</button>
</form>
</div>
</div>
</div>
@endsection
