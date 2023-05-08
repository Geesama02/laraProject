<?php

namespace App\Http\Controllers;

use App\Models\Professeur;
use Illuminate\Http\Request;

class ProfesseurController extends Controller
{
    //
    public function index()
    {
        $professeurs = Professeur::get();
        return view('professeur.index', [
            'professeurs' => $professeurs
        ]);
    }
}
