<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Microcontenido extends Model
{
    //


    protected $fillable = [
        'tipo', 'titulo', 'subtitulo', 'texto','autor','comienzo','caduca',
    ];


    //Un Microcontenido pertenece a muchos usuarios,tags, perfiles.
    
    public function users(){
        return $this->belongsToMany(User::class,'user_content','contenido_id','user_id')->withPivot('opciones', 'visible');
    }
   
    public function tags(){
        return $this->belongsToMany(Tag::class,'content_tags','content_id','tag_id');
    }

    public function perfiles(){
        return $this->belongsToMany(Perfil::class);
    }


}
