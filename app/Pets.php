<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pets extends Model
{
    //array di fillable
    protected $fillable = [
        'nome',
        'razza',
        'dettagli',
        'pedigree',
        'slug',
        'img',
    ];
}
