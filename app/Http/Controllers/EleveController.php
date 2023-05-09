<?php

namespace App\Http\Controllers;

use App\Models\Eleve;
use Illuminate\Http\Request;

class EleveController extends Controller
{
    public function index(){
        $clubes = Eleve::with('professeur')->get();
        return view('clube.index',compact('clubes'));
    }
}
