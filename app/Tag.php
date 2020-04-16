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
        return $this->belongsToMany(Microcontenido::class,'content_tags','tag_id','content_id');//,'contenido_id','tag_id');
    }





    public function users(){
        return $this->belongsToMany(User::class,'tag_user','user_id','tag_id');
    }
    

}
