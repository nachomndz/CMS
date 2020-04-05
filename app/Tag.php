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
        return $this->belongsToMany(Microcontenido::class);
    }

    public function users(){
        return $this->belongsToMany(User::class);
    }
    

}
