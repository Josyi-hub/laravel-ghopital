<head><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
@extends('layouts.app')

@section('content')
    <div class="">
        @if(session()->get('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
        @endif

<!-- Pop-up -->
<div id="popup" class="modal">
       <div class="modal-dialog">
                <div class="modal-content">
                 <div class="modal-header">
                     <p> <h6 class="display-3">Ajouter un Rendez-vous</h6> </p>
                       </div>
                 <div class="modal-body">
                    <div class="d-flex align-items-start">

                        <div class="tab-content" id="v-pills-tabContent">
                            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                <div class="row">
                                    <div class="col-sm-8 offset-sm-2">
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
                                            <form method="post" action="{{ route('rdv.store') }}">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="patient_id">Numero Patient:</label>
                                                    <input type="text" maxlength="4" class="form-control" name="patient_id" />
                                                </div>
                                                <div class="form-group">
                                                    <label for="medecin_id">Spécialité:</label>
                                                    <select id="medecin_id" class="form-control" name="medecin_id">
                                                        <option value="">--Choisir la spécialité--</option>
                                                        @foreach ($type_medecins as $type_medecin)
                                                            <option value="{{ $type_medecin->id }}">{{ $type_medecin->nomType }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label for="dateRDV">Date du rendez-vous:</label>
                                                    <input type="date" class="form-control" name="dateRDV" />
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary-outline">Ajouter Rendez-vous</button>
                                                      </div>
                                               </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">

                            </div>
                            <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">...
                            </div>
                            <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">...
                            </div>
                        </div>
                    </div>
                       </div>

       </div>
</div>

        <div class="d-flex align-items-start">
            <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <button type="button" data-toggle="modal" data-target="#popup" class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home"
                    type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Rendez-vous</button>
                <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile"
                    type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">Annuler</button>
                <button class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages"
                    type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">Modifier</button>
                <button class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings"
                    type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">Etat des
                    Rendez-vous</button>
            </div>
            <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                    <div class="row">
                        <div class="col-sm-8 offset-sm-2">
                            <h2 class="display-3">Ajouter un Rendez-vous</h2>
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
                                <form method="post" action="{{ route('rdv.store') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label for="patient_id">Numero Patient:</label>
                                        <input type="text" maxlength="4" class="form-control" name="patient_id" />
                                    </div>
                                    <div class="form-group">
                                        <label for="medecin_id">Spécialité:</label>
                                        <select id="medecin_id" class="form-control" name="medecin_id">
                                            <option value="">--Choisir la spécialité--</option>
                                            @foreach ($type_medecins as $type_medecin)
                                                <option value="{{ $type_medecin->id }}">{{ $type_medecin->nomType }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="dateRDV">Patient:</label>
                                        <input type="date" class="form-control" name="dateRDV" />
                                    </div>

                                    <button type="submit" class="btn btn-primary-outline">Ajouter Rendez-vous</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">

                </div>
                <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">...
                </div>
                <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">...
                </div>
            </div>
        </div>
    </div>
@endsection
</body>

