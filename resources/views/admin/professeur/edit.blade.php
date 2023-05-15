@extends('layouts.app')

@section('contents')
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="./assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="./assets/css/nucleo-svg.css" rel="stylesheet" />

  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/argon-dashboard.css" rel="stylesheet" />
<div class="card">
    <div class="card-header pb-0">
        <div class="d-flex align-items-center mb-2">
            <p class="mb-0">Ajouter un nouveau Professeur</p>
        </div>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('admin.professeurs.update', $professeur->id) }}">
            @csrf
            @method("PUT")
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="example-text-input" class="form-control-label">PPR</label>
                    <input class="form-control" name="ppr" value="{{$professeur->ppr}}" type="number">
                    @error('ppr') <p class="text-danger text-xs pt-1"> {{$message}} </p>@enderror

                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Cin</label>
                    <input class="form-control" type="text" value="{{$professeur->cin}}" name="cin">
                    @error('cin') <p class="text-danger text-xs pt-1"> {{$message}} </p>@enderror
                    
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Prénom</label>
                    <input class="form-control" type="text" value="{{$professeur->prenom}}" name="prenom">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Nom</label>
                    <input class="form-control" type="text" value="{{$professeur->nom}}" name="nom">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Email</label>
                    <input class="form-control" type="email" value="{{$professeur->email}}"
                    name="email">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Password</label>
                    <input class="form-control" type="password" value="{{$professeur->password}}" name="password">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Sexe</label>
                    <select name="sexe" value="{{$professeur->sexe}}" class="form-control mb-3">
                        <option value="mâle" @if ($professeur->sexe == "mâle") selected @endif>Mâle</option>
                        <option value="femme" @if ($professeur->sexe == "femme") selected @endif>Femme</option>
                      </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Etablissement</label>
                        <select id="etablissement_id" value="{{$professeur->etablissement_id}}" name="etablissement_id" class="form-control mb-3">
                            <option selected>Choose...</option>
                            @foreach ($etablissement as $etablissement)
                             <option value="{{ $etablissement->id }}" @if ($etablissement->id == $professeur->etablissement_id) selected @endif> {{$etablissement->nom_francaise}}</option>
                        @endforeach
                          </select></div>
            </div>
        </div>
        <div class="text-center">
        <button type="submit" class="btn btn-primary font-weight-bolder btn-sm px-2"> <i class="fas fa-user-plus"></i>
            {{__("Edit")}}</button>
        </div>
        </form>
    
    </div>
@endsection
