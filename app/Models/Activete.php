<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activete extends Model
{
    use HasFactory;
    public function club()
    {
        return $this->belongsTo(Club::class);
    }
    public function etablissement()
    {
        return $this->belongsTo(Etablissement::class);
    }

    public function eleves()
    {
        return $this->belongsToMany(Eleve::class, 'activete_eleve');
    }
}
