@extends('base')

@section('main')
<div class="row">
    <div class="col-sm-12">
        @if(session()->get('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
        @endif
        <h1 class="display-3">Patients</h1>
        <div>
            <a style="margin: 19px;" href="{{ route('patients.create')}}" class="btn btn-primary">Nouveau patient</a>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Actions</td>
                </tr>
            </thead>
            <tbody>
                @foreach($patients as $patient)
                <tr>
                    <td>{{$patient->id}}</td>
                    <td>
                        <a href="{{ route('patients.edit',$patient->id)}}" class="btn btn-primary">Editer</a>
                    </td>
                    <td>
                        <form action="{{ route('patients.destroy', $patient->id)}}" method="post">
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
