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
                        <h6>{{ __("Clubs List") }}</h6>
                        <div class="d-flex">
                            <form class="mr-3 mb-2">
                            <input class="form-control mr-2" placeholder="Search" type="search" name="search" />
                            </form>
                        </div>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center justify-content-center mb-0">
                                <thead>
                                    <tr>
                                        <th class=" text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            {{ __("titre") }}</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            {{ __("type") }}</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            {{ __("professeur") }}</th>

                                    </tr>
                                </thead>
                                <tbody>
                                     @foreach ($clubes as $clube)
                                    <tr>
                                        <td class="text-center text-sm font-weight-bold mb-0">{{ $clube->titre}}</td>
                                        <td class="text-center text-sm font-weight-bold mb-0">{{ $clube->type}}</td>
                                        <td class="text-center text-sm font-weight-bold mb-0">{{$clube->professeur->nom}}</td>
                                        </td>
                                    
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{$clubes->links()}}
@endsection
