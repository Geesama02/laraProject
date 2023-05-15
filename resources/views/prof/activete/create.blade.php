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
        <form method="POST" action="/prof/activetes">
            @csrf
            @method("POST")
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Titre</label>
                    <input class="form-control" name="titre" type="text" required>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Description</label>
                    <input class="form-control" type="text" name="description" required>
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
            
        </div>
        <div class="text-center">
        <button type="submit" class="btn btn-primary font-weight-bolder btn-sm px-2"> <i class="fas fa-user-plus"></i>
            {{__("Ajouter")}}</button>
        </div>
        </form>
    
    </div>
   
    
@endsection




