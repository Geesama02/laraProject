<?php

namespace App\Http\Controllers\prof;

use App\Http\Controllers\Controller;
use App\Models\Activete;
use App\Models\Club;
use App\Models\Professeur;
use Illuminate\Http\Request;

class ActiveteController extends Controller
{
    //
    public function index()
    {
        $email = auth()->user()->email;
        $prof = Professeur::where('email', $email)->first();
        if (request('search')) {
            $activetes = Activete::with('club')->where("etablissement_id", $prof->etablissement_id)->where('titre', 'like', '%' . request('search') . '%')->latest()->paginate(10);

        } else {
            $activetes = Activete::with('club')->where("etablissement_id", $prof->etablissement_id)->latest()->paginate(10);

        }
        
        return view('prof.activete.index', [
            'activetes' => $activetes,
        ]);
    }
    public function create()
    {
        return view('prof.activete.create');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'titre' => ['required'],
            'description' => ['required'],
      
        ]);
        $email = auth()->user()->email;
        $prof = Professeur::where('email', $email)->first();
       
        
        $activity = new Activete;
        $activity->titre = $validated['titre'];
        $activity->description = $validated['description'];
        $activity->etablissement_id = $prof->etablissement_id;
        $activity->club_id = null;

       //  $activity->create($validated);
       $activity->save();
     
        return redirect('/prof/activetes');
    }
}
