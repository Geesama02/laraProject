<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Eleve;
use App\Models\Etablissement;
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
        $eleves = Eleve::count();
        $elevesHomme = Eleve::where('sexe', 'mâle')->count();
        $elevesFemme = Eleve::where('sexe', 'femme')->count();
        $elevesEndecapé = Eleve::where('endecapé', 1)->count();
        $elevesPrimaire = Eleve::whereIn('niveau_scolaire', ['1-primaire', '2-primaire','3-primaire','4-primaire','5-primaire','6-primaire'])->count();
        $elevesCollege = Eleve::whereIn('niveau_scolaire', ['1-college', '2-college', '3-college'])->count();
        $elevesLycee = Eleve::whereIn('niveau_scolaire', ['1-lycee', '2-lycee', '3-lycee'])->count();
        $etablissementTypePublic = Etablissement::where('type', 'public')->count();
        $etablissementTypePrive = Etablissement::where('type', 'prive')->count();
        return view('admin.dashboard', [
            'eleves' => $eleves,
            'elevesHomme' => $elevesHomme,
            'elevesFemme' => $elevesFemme,
            'elevesEndecapé' => $elevesEndecapé,
            'elevesPrimaire' => $elevesPrimaire,
            'elevesCollege' => $elevesCollege,
            'elevesCollege' => $elevesCollege,
            'elevesLycee' => $elevesLycee,
            'etablissementTypePublic' => $etablissementTypePublic,
            'etablissementTypePrive' => $etablissementTypePrive,
        ]);
    }
}
