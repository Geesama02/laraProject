@extends('layouts.app')

@section('contents')
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="./assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="./assets/css/nucleo-svg.css" rel="stylesheet" />
  

  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
  <link
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
  rel="stylesheet"
/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
<style type="text/css">
    .dropdown-toggle{
        height: 40px;
        width: 100% !important;
        border: 1px solid #D1D3E2 !important; 
    }
</style>



<div class="card">
    <div class="card-header pb-0">
        <div class="d-flex align-items-center mb-2">
            <p class="mb-0">Ajouter un nouveau Eleve</p>
        </div>
    </div>
    <div class="card-body">
        <form method="POST" action="/prof/eleves">
            @csrf
            @method("POST")
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Code Massar</label>
                    <input class="form-control" name="codeMassar" type="text" required>
                    @error('codeMassar') <p class="text-danger text-xs pt-1"> {{$message}} </p>@enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Nom Arabe</label>
                    <input class="form-control" type="text" name="nom_arabe" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Prenom Arabe</label>
                    <input class="form-control" type="text" name="prenom_arabe" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Nom Francaise</label>
                    <input class="form-control" type="text" name="nom_francaise" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Prenom Francaise</label>
                    <input class="form-control" type="text" name="prenom_francaise" required>
                </div>
            </div>
        </div>
        <div class="row">
           
        
            <div class="col-md-6">
                <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Niveau Scolaire</label>
                    <select name="niveau_scolaire" class="form-control mb-3" required>
                        <option selected>Choisi...</option>
                        @if ($etablissement->niveau == 'primaire')
                            <option value="1-primaire">1er Annèe Primaire</option>
                            <option value="2-primaire">2eme Annèe Primaire</option>
                            <option value="3-primaire">3eme Annèe Primaire</option>
                            <option value="4-primaire">4eme Annèe Primaire</option>
                            <option value="5-primaire">5eme Annèe Primaire</option>
                            <option value="6-primaire">6eme Annèe Primaire</option>
                        @endif
                        @if ($etablissement->niveau == 'college')
                            <option value="1-college">1er Annèe College</option>
                            <option value="2-college">2eme Annèe College</option>
                            <option value="3-college">3eme Annèe College</option>
                        @endif
                        @if ($etablissement->niveau == 'lycee')
                            <option value="1-lycee">Tronc Commun</option>
                            <option value="2-lycee">1er Annèe Bac</option>
                            <option value="3-lycee">2eme Annèe Bac</option>
                        @endif
                      </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Sexe</label>
                    <select name="sexe" class="form-control mb-3" required>
                        <option selected>Choisi...</option>
                        <option value="mâle">Mâle</option>
                        <option value="femme">Femme</option>
                      </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Endecapé</label>
                    <select name="endecapé" class="form-control mb-3" required>
                        <option selected>Choisi...</option>
                        <option value="{{1}}">Oui</option>
                        <option value="{{0}}">Non</option>
                      </select>
                </div>
            </div>
            {{-- <div class="col-md-6">
                <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Activities</label>
                    <select id="activities" name="activities_id" class="form-control mb-3">
                        <option selected>Choose...</option>
                        @foreach ($activities as $activitie)
                        <option value="{{ $activitie->id }}"> {{$activitie->titre}}</option>
                        @endforeach
                      </select>
                </div>
            </div> --}}
            <div class="col-md-6">
                <div class="form-group ">
                    <label for="example-text-input" class="form-control-label">Activities</label>
                    <br>
                    <select id="example-text-input" class="selectpicker mb-3" multiple data-live-search="true" name="activities_id[]">
                        @foreach ($activities as $activitie)
                        <option value="{{ $activitie->id }}"> {{$activitie->titre}}</option>
                        @endforeach
                      </select>
                </div>
            </div>
        </div>
        <div class="text-center">
        <button type="submit" class="btn btn-primary font-weight-bolder btn-sm px-2"> <i class="fas fa-user-plus"></i>
            {{__("Ajouter")}}</button>
        </div>
        </form>
    
    </div>
   
    
@endsection




