<?php

namespace App\Http\Controllers;

use App\Models\Eleve;
use Illuminate\Http\Request;

class EleveController extends Controller
{
    //
    public function index()
    {
        $eleves = Eleve::with('etablissement')->latest()->paginate(10);
        return view('eleve.index', [
            'eleves' => $eleves
        ]);
    }
}
