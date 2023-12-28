<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vigile extends Model
{
    use HasFactory;
    protected $table = 'vigiles';
    protected $fillable = [
        'nom',
        'prenom',
        'dateNaissance',
        'sexe',
        'taille',
        'poids'

    ];
}
