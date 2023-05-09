<?php

namespace App\Http\Controllers;

use App\Models\Eleve;
use Illuminate\Http\Request;

class EleveController extends Controller
{
    //
    public function index()
    {
        $eleves = Eleve::with('etablissement')->latest()->get();
        return view('eleve.index', [
            'eleves' => $eleves
        ]);
    }


}
