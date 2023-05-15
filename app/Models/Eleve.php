<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eleve extends Model
{
    use HasFactory;
    public function activetes()
    {
        return $this->belongsToMany(Activete::class,'activete_eleve');
    }

    public function etablissement(){
        return $this->belongsTo(Etablissement::class,);
    }
}
