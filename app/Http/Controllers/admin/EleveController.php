<?php


namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Eleve;
use Illuminate\Http\Request;

class EleveController extends Controller
{
    //
    public function index()
    {
        if (request('search')) {
            
        $eleves = Eleve::with('etablissement')->latest()->where('nom_francaise', 'like', '%' . request('search') . '%')->paginate(10);
        } else{
            $eleves = Eleve::with('etablissement')->latest()->paginate(10);
        }
        // $eleves = Eleve::with('etablissement')->latest()->paginate(10);
        return view('admin.eleve.index', [
            'eleves' => $eleves
        ]);
    }
}
