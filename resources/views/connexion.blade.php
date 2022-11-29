@extends('base')

@section('main')
    <form action="/connexion" method="post" class="section">
        {{ csrf_field() }}



        <div class="field">
            <label class="label">Numero patient</label>
            <div class="control">
                <input class="input" type="text" name="numPatient">
            </div>
            @if($errors->has('numPatient'))
                <p class="help is-danger">{{ $errors->first('numPatient') }}</p>
            @endif
        </div>

        <div class="field">
            <div class="control">
                <button class="button is-link" type="submit">Se connecter</button>
            </div>
        </div>
    </form>
@endsection
