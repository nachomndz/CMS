<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Microcontenido extends Model
{
    //



    protected $fillable = [
        'tipo', 'noticia', 'comienza', 'caduca',
    ];


    //Un Microcontenido pertenece a muchos usuarios,tags, perfiles.
    
    public function users(){
        return $this->belongsToMany(User::class);
    }

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }

    public function perfiles(){
        return $this->belongsToMany(Perfil::class);
    }


}
