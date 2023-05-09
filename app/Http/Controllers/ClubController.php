<?php

namespace App\Http\Controllers;

use App\Models\Club;
use Illuminate\Http\Request;

class ClubController extends Controller
{
    public function index()
    {
        $clubes = Club::with('professeur')->paginate(9);
        return view('clube.index', compact('clubes'));
    }

    public function destroy(string $id)
    {
        $clube = Club::findOrfail($id);
        $clube->delete();
        return redirect('/clube.index');
    }
}
