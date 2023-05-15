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
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0 d-flex justify-content-between">
                        <h6>{{ __("Professeurs List") }}</h6>
                        <div class="d-flex">
                            <form class="mr-3">
                            <input class="form-control mr-2" placeholder="Search" type="search" name="search" />
                            </form>
                        <a class="btn btn-outline-primary font-weight-bolder btn-sm mb-2" href="/admin/professeurs/create">
                            <i class="fas fa-user-plus"></i>
                            {{__("Ajouter")}}</a>
                        </div>
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
                                        
                                        <td class="text-primary"><a href="{{route('admin.professeurs.edit', $professeur->id)}}" class=" text-primary font-weight-bold text-xs">
                                            <i class="fas fa-user-edit"></i>
                                            Edit
                                        </a></td>
                                        <td class="text-danger"><form method="POST" action="{{ route('admin.professeurs.destroy', $professeur->id)}}">

                                            @csrf
                                            @method('DELETE')
                                            <button class="bg-none text-danger font-weight-bold text-xs" style="background-color:transparent; border:none" >
                                                <i class="fas fa-trash-alt"></i>
                                            
                                                Delete</button>
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
    {{$professeurs->links()}}

@endsection
