<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professeur extends Model
{
    use HasFactory;
    protected $fillable = [
        'ppr',
        'cin',
        'prenom',
        'nom',
        'email',
        'password',
        'sexe',
        'etablissement_id',
    ];
    public function club(){
        return $this->hasMany(Club::class);
    }

    public function etablissement(){
        return $this->belongsTo(Etablissement::class);
    }
}
