@extends('base')
@section('main')
<div class="row">
<div class="col-sm-8 offset-sm-2">
 <h1 class="display-3">Ajouter un Rendez-vous</h1>
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
 <form method="post" action="/inscription">
 @csrf
 <div class="form-group">
 <label for="numPatient">Numero Patient:</label>
 <input type="text" class="form-control" name="numPatient"/>
 </div>

<button type="submit" class="btn btn-primary-outline">Inscrivez vous</button>
</form>
</div>
</div>
</div>
@endsection
