<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //



    protected $fillable = [
        'name',
    ];


 
    public function microcontenidos(){
        return $this->belongsToMany(Microcontenido::class);//,'contenido_id','tag_id');
    }





    public function users(){
        return $this->belongsToMany(User::class);
    }
    

}
