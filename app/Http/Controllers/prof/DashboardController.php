<?php

namespace App\Http\Controllers\prof;

use App\Http\Controllers\Controller;
use App\Models\Eleve;
use App\Models\Professeur;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index()
    {
       //  $eleves = Eleve::where()->latest()->paginate(10);
       $email = auth()->user()->email;
        $prof = Professeur::where('email', $email)->first();
       //  dd($prof->etablissement_id);
       //  $etablissement = Etablissement::with('eleves')->where('id', $prof->etablissement_id)->first();
        $eleves = Eleve::where('etablissement_id' , $prof->etablissement_id)->count();
        $elevesHomme = Eleve::where('etablissement_id' , $prof->etablissement_id)->where('sexe', 'mâle')->count();
        $elevesFemme = Eleve::where('etablissement_id' , $prof->etablissement_id)->where('sexe', 'femme')->count();
        $elevesEndecapé = Eleve::where('etablissement_id' , $prof->etablissement_id)->where('endecapé', 1)->count();
        return view('prof.dashboard', [
            'eleves' => $eleves,
            'elevesHomme' => $elevesHomme,
            'elevesFemme' => $elevesFemme,
            'elevesEndecapé' => $elevesEndecapé,
        ]);
    }
}
