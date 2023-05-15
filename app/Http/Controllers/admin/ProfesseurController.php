<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Etablissement;
use App\Models\Professeur;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;


class ProfesseurController extends Controller
{
    //
    public function index()
    {
        if (request('search')) {
            $professeurs = Professeur::with('etablissement')->latest()->where('nom', 'like', '%' . request('search') . '%')->paginate(10);
            
        } else {
            $professeurs = Professeur::with('etablissement')->latest()->paginate(10);



        }
        // $professeurs = Professeur::with('etablissement')->latest()->paginate(10);
        return view('admin.professeur.index', [
            'professeurs' => $professeurs
        ]);
    }
    public function create()
    {
        $etablissement = Etablissement::get();

        return view('admin.professeur.create',[
            'etablissement' => $etablissement
        ]);
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'ppr' => ['required', 'unique:professeurs'],
            'cin' => ['required', 'unique:professeurs'],
            'prenom' => ['required'],
            'nom' => ['required'],
            'email' => ['required', 'unique:professeurs'],
            'password' => ['required'],
            'sexe' => ['required'],
            'etablissement_id' => ['required'],
        ]);
       
        $userProf = User::create([
            'name' => $validated['nom'] . ' ' . $validated['prenom'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => 'prof',
        ]);
        $userProf -> save();
     
        $professeur = Professeur::create($validated);
        $professeur->save();
        

        return redirect('/admin/professeurs');
    }
    public function edit(Professeur $professeur)
    {
        $etablissement = Etablissement::get();
      
        

        return view('admin.professeur.edit',[
            'professeur' => $professeur,
            'etablissement' => $etablissement,

        ]);
    }
    public function update(Request $request, Professeur $professeur)
    {

        $validated = $request->validate([
            'ppr' => 'required|unique:professeurs,ppr,'.$professeur->id,
            'cin' => 'required|unique:professeurs,cin,'.$professeur->id,
            'prenom' => ['required'],
            'nom' => ['required'],
            'email' => ['required'],
            'password' => ['required'],
            'sexe' => ['required'],
            'etablissement_id' => ['required'],
        ]);
        $professeur->update($validated);
        $professeur->save();
        

        return redirect('/admin/professeurs');
    }
    public function destroy(Professeur $professeur)
    {
        $professeur->delete();
        return redirect('/admin/professeurs');
    
    }
}
