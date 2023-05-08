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

    public function eleve()
    {
        return $this->belongsToMany(Eleve::class,'activetes_eleves');
    }
}
