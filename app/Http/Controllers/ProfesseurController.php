<?php

namespace App\Http\Controllers;

use App\Models\Etablissement;
use App\Models\Professeur;
use Illuminate\Http\Request;

class ProfesseurController extends Controller
{
    //
    public function index()
    {
        $professeurs = Professeur::with('etablissement')->latest()->paginate(10);
        return view('professeur.index', [
            'professeurs' => $professeurs
        ]);
    }
    public function create()
    {
        $etablissement = Etablissement::get();

        return view('professeur.create',[
            'etablissement' => $etablissement
        ]);
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'ppr' => ['required'],
            'cin' => ['required'],
            'prenom' => ['required'],
            'nom' => ['required'],
            'email' => ['required'],
            'password' => ['required'],
            'sexe' => ['required'],
            'etablissement_id' => ['required'],
        ]);
       
     
        $professeur = Professeur::create($validated);
        $professeur->save();
        

        return redirect('/professeurs');
    }
    public function edit(Professeur $professeur)
    {
        $etablissement = Etablissement::get();

        return view('professeur.edit',[
            'professeur' => $professeur,
            'etablissement' => $etablissement

        ]);
    }
    public function update(Request $request, Professeur $professeur)
    {

        $validated = $request->validate([
            'ppr' => ['required'],
            'cin' => ['required'],
            'prenom' => ['required'],
            'nom' => ['required'],
            'email' => ['required'],
            'password' => ['required'],
            'sexe' => ['required'],
            'etablissement_id' => ['required'],
        ]);
        $professeur->update($validated);
        $professeur->save();
        

        return redirect('/professeurs');
    }
    public function destroy(Professeur $professeur)
    {
        $professeur->delete();
        return redirect('/professeurs');
    
    }
}
