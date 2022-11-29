@extends('base')
@section('main')
<div class="row">
<div class="col-sm-8 offset-sm-2">
 <h1 class="display-3">Ajouter un patient</h1>
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
 <form method="post" action="{{ route('patients.store') }}">
 @csrf
 <button type="submit" class="btn btn-primary-outline">Ajouter Patient</button>
</form>
</div>
</div>
</div>
@endsection
