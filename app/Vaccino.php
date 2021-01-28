<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vaccino extends Model
{


    //relazione many to many vaccino - pets
     public function Pets()
    {
        return $this->belongsToMany('App\Pets');
    }
}
