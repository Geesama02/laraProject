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
  <link id="pagestyle" href="assets/css/argon-dashboard.css" rel="stylesheet" />
    <div class="container-fluid py-4">
        
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>{{ __("Professeurs List") }}</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center justify-content-center mb-0">
                                <thead>
                                    <tr>
                                        <th class=" text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            {{ __("PPR") }}</th>
                                        <th 
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            {{ __("Nom et prénom") }}</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            {{ __("Cin") }}</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">
                                            {{ __("Etablissement") }}</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                     @foreach ($professeurs as $professeur)

                                    <tr>
                                        <td class="text-center text-sm font-weight-bold mb-0">{{ $professeur->ppr}}</td>
                                        <td class="text-center text-sm font-weight-bold mb-0">{{ $professeur->nom}} {{ $professeur->prenom}}</td>
                                        <td class="text-center text-sm font-weight-bold mb-0">{{ $professeur->cin}}</td>
                                        <td class="text-center text-sm font-weight-bold mb-0">{{ $professeur->etablissement->nom_francaise}}</td>
                                        
                                        <td><a class="text-secondary font-weight-bold text-xs">
                                            <i class="bi-pencil"></i>
                                            Edit
                                        </a></td>
                                        <td><form method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <i class="fas fa-user-pen"></i>
                                            <a class="text-secondary font-weight-bold text-xs">Delete</a>
                                            </form></td>
                                       
                                        
                                        
                                        @endforeach
                                        </tr>
                                   
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
