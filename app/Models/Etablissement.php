<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etablissement extends Model
{
    use HasFactory;
    public function professeurs(){
        return $this->hasMany(Prof::class);
    }

    public function eleves(){
        return $this->hasMany(Eleve::class);
    }
}
