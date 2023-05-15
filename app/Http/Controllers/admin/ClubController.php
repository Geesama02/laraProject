<?php


namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Club;
use Illuminate\Http\Request;

class ClubController extends Controller
{
    public function index()
    {
        if (request('search')) {
            $clubes = Club::with('professeur')->where('titre', 'like', '%' . request('search') . '%')->latest()->paginate(10);
        
        } else {
            $clubes = Club::with('professeur')->latest()->paginate(10);


        }
        // $clubes = Club::with('professeur')->paginate(10);
        return view('admin.clube.index', compact('clubes'));
    }

    public function destroy(string $id)
    {
        $clube = Club::findOrfail($id);
        $clube->delete();
        return redirect('admin.clube.index');
    }
}
