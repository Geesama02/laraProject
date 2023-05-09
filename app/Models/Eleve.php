<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eleve extends Model
{
    use HasFactory;
    public function activate()
    {
        return $this->belongsToMany(Activite::class,'');
    }

    public function etablissement(){
        return $this->belongsTo(Etablissement::class,);
    }
}
