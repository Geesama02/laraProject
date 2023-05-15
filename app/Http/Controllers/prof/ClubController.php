<?php


namespace App\Http\Controllers\prof;

use App\Http\Controllers\Controller;
use App\Models\Activete;
use App\Models\Club;
use App\Models\clube;
use App\Models\Etablissement;
use App\Models\Professeur;
use Illuminate\Http\Request;

class ClubController extends Controller
{
    public function index()
    {
        $email = auth()->user()->email;
        $prof = Professeur::where('email', $email)->first();
        if (request('search')) {
            $clubes = Club::with('activetes')->where('professeur_id' , $prof->id)->where('titre', 'like', '%' . request('search') . '%')->latest()->paginate(10);

        } else {
            $clubes = Club::with('activetes')->where('professeur_id' , $prof->id)->latest()->paginate(10);

        }
        
        return view('prof.clube.index', [
            'clubes' => $clubes,
        ]);
    }
    public function create()
    {
       $email = auth()->user()->email;
        $prof = Professeur::where('email', $email)->first();
    //     $etablissement = Etablissement::where('id' , $prof->etablissement_id)->first();
        $activities = Activete::where("etablissement_id", $prof->etablissement_id)->where('club_id', null)->get();

        return view('prof.clube.create',[   
            'activities' => $activities,
        ]);
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'titre' => ['required'],
            'type' => ['required'],
      
        ]);
        $email = auth()->user()->email;
        $prof = Professeur::where('email', $email)->first();
       
        
        $clube = new Club;
        $clube->titre = $validated['titre'];
        $clube->type = $validated['type'];
        $clube->professeur_id = $prof->id;
       //  $clube->create($validated);
       $clube->save();
       $activity = Activete::where("etablissement_id", $prof->etablissement_id)->find($request->activities_id);
       if ($activity != null) {

       foreach($activity as $a){
       $a->club_id = $clube->id;
    //    dd($activity);
       $a->update();
       }
    }
        return redirect('/prof/clubes');
    }
    public function edit($id)
    {
       $email = auth()->user()->email;
       $prof = Professeur::where('email', $email)->first();
       $clube = Club::with('activetes')->findOrFail($id);
    //    $etablissement = Etablissement::where('id' , $prof->etablissement_id)->first();
       //  $etablissement = Etablissement::get();
       $ids = $clube->activetes->pluck('id')->toArray();
       $activities = Activete::where("etablissement_id", $prof->etablissement_id)
                            ->where('club_id', $clube->id)->orWhere('club_id', null)->get();
    
       
       // foreach($clube->activetes as $activity)

        return view('prof.clube.edit',[
            'clube' => $clube,
            'activities' => $activities,
            'ids' => $ids,
        ]);
    }
    public function update(Request $request, $id)
    {
       
       $clube = Club::findOrFail($id);

       $validated = $request->validate([
        'titre' => ['required'],
        'type' => ['required'],
       ]);
      
       $email = auth()->user()->email;
       $prof = Professeur::where('email', $email)->first();
       $clube = Club::findOrFail($id);
       $clube->titre = $validated['titre'];
       $clube->type = $validated['type'];
       $clube->professeur_id = $prof->id;
      //  $clube->create($validated);
        $clube->update();
   //    $activity = Activete::find($request->activities_id);
        $activity = Activete::where("etablissement_id", $prof->etablissement_id)->find($request->activities_id);
        $RemovedActivity =  Activete::where("etablissement_id", $prof->etablissement_id)->where('club_id', $clube->id)->where('id', '!=', $request->activities_id)->get();

        foreach($RemovedActivity as $a){
            $a->club_id = null;
            //    dd($activity);
            $a->update();
            }
        // dd($activity);
        if ($activity != null) {
            foreach($activity as $a){
                $a->club_id = $clube->id;
                //    dd($activity);
                $a->update();
                }
        }
      
        

        return redirect('/prof/clubes');
    }

    public function destroy($id)
    {
        $email = auth()->user()->email;
       $prof = Professeur::where('email', $email)->first();
        $clube = Club::findOrfail($id);
        $RemovedActivity =  Activete::where("etablissement_id", $prof->etablissement_id)->where('club_id', $id)->get();

        $clube->delete();
        
        foreach($RemovedActivity as $a){
            $a->club_id = null;
            //    dd($activity);
            $a->update();
            }
        return redirect('/prof/clubes');
    }
}
