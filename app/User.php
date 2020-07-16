<?php

namespace App;

use App\Notifications\CambiarPassword;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use jeremykenedy\LaravelRoles\Traits\HasRoleAndPermission;
use Illuminate\Foundation\Auth\User as Authenticatable;



//use Illuminate\Auth\Authenticable as AuthenticableTrait;
class User extends Authenticatable
{
    use Notifiable;
    use HasRoleAndPermission;
    //use AuthenticableTrait;

 
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'telefono','perfil_id', 
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
       // 'intereses' => 'array',
    ];

/*Roles*/

    public function authorizeRoles($roles)
{
    abort_unless($this->hasAnyRole($roles), 401);
    return true;
}
public function hasAnyRole($roles)
{
    if (is_array($roles)) {
        foreach ($roles as $role) {
            if ($this->hasRole($role)) {
                return true;
            }
        }
    } else {
        if ($this->hasRole($roles)) {
             return true; 
        }   
    }
    return false;
}
public function hasRole($role)
{
    if ($this->roles()->where('name', $role)->first()) {
        return true;
    }
    return false;
}




//Cada usuario pertenece a un perfil (belongsTo se usa para 1 a muchos). 
//1 perfil puede tener muchos usuarios.

public function perfil(){
    return $this->belongsTo(Perfil::class,'perfil_id');
}
//Cada usuario le corresponden muchos microcontenidos
//belongsToMany se usa para muchos a muchos
//modificado...
public function microcontenidos(){
    return $this->belongsToMany(Microcontenido::class,'user_content','user_id','contenido_id')->withPivot('opciones', 'visible');
}

//muchos a muchos con tags
public function tags(){
    return $this->belongsToMany(Tag::class,'tag_user','user_id','tag_id');
}





public function sendPasswordResetNotification($token)
{
    $this->notify(new CambiarPassword($token));
}

}
