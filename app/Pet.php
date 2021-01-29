<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pet extends Model
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

    // relazione many to many pets - vaccinos

   public function vaccinos()
   {
       return $this->belongsToMany('App\Vaccino');
   }
}
