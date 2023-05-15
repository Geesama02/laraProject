<?php

namespace App\Http\Controllers\prof;

use App\Http\Controllers\Controller;
use App\Models\Activete;
use App\Models\Eleve;
use App\Models\Etablissement;
use App\Models\Professeur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EleveController extends Controller
{
    //
     //
     public function index()
     {
        //  $eleves = Eleve::where()->latest()->paginate(10);
        $email = auth()->user()->email;
         $prof = Professeur::where('email', $email)->first();
         if (request('search')) {
            $eleves = Eleve::where('etablissement_id' , $prof->etablissement_id)->where('nom_francaise', 'like', '%' . request('search') . '%')->latest()->paginate(10);
        } else{
         $eleves = Eleve::where('etablissement_id' , $prof->etablissement_id)->latest()->paginate(10);

        }
        //  dd($prof->etablissement_id);
        //  $etablissement = Etablissement::with('eleves')->where('id', $prof->etablissement_id)->first();
         return view('prof.eleve.index', [
             'eleves' => $eleves
         ]);
     }
     public function create()
     {
        $email = auth()->user()->email;
         $prof = Professeur::where('email', $email)->first();
         $etablissement = Etablissement::where('id' , $prof->etablissement_id)->first();

         $activities = Activete::get();
 
         return view('prof.eleve.create',[
             'activities' => $activities,
             'etablissement' => $etablissement,
         ]);
     }
     public function store(Request $request)
     {
         $validated = $request->validate([
             'codeMassar' => ['required', 'unique:eleves'],
             'nom_arabe' => ['required'],
             'nom_francaise' => ['required'],
             'prenom_arabe' => ['required'],
             'prenom_francaise' => ['required'],
             'niveau_scolaire' => ['required'],
             'sexe' => ['required'],
             'endecapé' => ['required'],
         ]);
         $email = auth()->user()->email;
         $prof = Professeur::where('email', $email)->first();
        
         
         $eleve = new Eleve;
         $eleve->codeMassar = $validated['codeMassar'];
         $eleve->nom_arabe = $validated['nom_arabe'];
         $eleve->nom_francaise = $validated['nom_francaise'];
         $eleve->prenom_arabe = $validated['prenom_arabe'];
         $eleve->prenom_francaise = $validated['prenom_francaise'];
         $eleve->sexe = $validated['sexe'];
         $eleve->niveau_scolaire = $validated['niveau_scolaire'];
         $eleve->endecapé = $validated['endecapé'];
         $eleve->etablissement_id = $prof->etablissement_id;
        //  $eleve->create($validated);
        $eleve->save();
        $activity = Activete::find($request->activities_id);
        $eleve->activetes()->attach($activity);
         
 
         return redirect('/prof/eleves');
     }
     public function edit($id)
     {
        $email = auth()->user()->email;
        $prof = Professeur::where('email', $email)->first();
        $eleve = Eleve::with('activetes')->findOrFail($id);
        $etablissement = Etablissement::where('id' , $prof->etablissement_id)->first();
        //  $etablissement = Etablissement::get();
        $ids = $eleve->activetes->pluck('id')->toArray();
        $activities = Activete::get();
     
        
        // foreach($eleve->activetes as $activity)

         return view('prof.eleve.edit',[
             'eleve' => $eleve,
             'activities' => $activities,
             'ids' => $ids,
             'etablissement' => $etablissement,
         ]);
     }
     public function update(Request $request, $id)
     {
        
        $eleve = Eleve::findOrFail($id);

        $validated = $request->validate([
            'codeMassar' => 'required|unique:eleves,codeMassar,'.$eleve->id,
            'nom_arabe' => ['required'],
            'nom_francaise' => ['required'],
            'prenom_arabe' => ['required'],
            'prenom_francaise' => ['required'],
            'sexe' => ['required'],
            'niveau_scolaire' => ['required'],
            'endecapé' => ['required'],
        ]);
       
        $email = auth()->user()->email;
        $prof = Professeur::where('email', $email)->first();

        $eleve->codeMassar = $validated['codeMassar'];
        $eleve->nom_arabe = $validated['nom_arabe'];
        $eleve->nom_francaise = $validated['nom_francaise'];
        $eleve->prenom_arabe = $validated['prenom_arabe'];
        $eleve->prenom_francaise = $validated['prenom_francaise'];
        $eleve->sexe = $validated['sexe'];
        $eleve->niveau_scolaire = $validated['niveau_scolaire'];
        $eleve->endecapé = $validated['endecapé'];
        $eleve->etablissement_id = $prof->etablissement_id;
       //  $eleve->create($validated);
       $eleve->update();
    //    $activity = Activete::find($request->activities_id);
       $eleve->activetes()->sync($request->input('activities_id'));
         
 
         return redirect('/prof/eleves');
     }
     public function destroy($id)
     {
        $eleve = Eleve::findOrFail($id);

       
         $eleve->activetes()->detach();
         $eleve->delete();
         return redirect('/prof/eleves');
     
     }
 
}
