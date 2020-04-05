<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    //



    protected $fillable = [
        'puesto',
    ];




    public function users(){
     return $this->hasMany(User::class);
    }
  
    public function microcontenidos(){
        return $this->belongsToMany(Microcontenido::class);
    }



}
