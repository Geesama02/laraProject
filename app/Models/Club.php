<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    use HasFactory;
    public function professeur(){
        return $this->belongsTo(Professeur::class);
    }

    public function activetes(){
        return $this->hasMany(Activete::class);
    }
}
