<?php

namespace navegadorcito;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{


    use Notifiable;

    const ADMIN_TYPE = 'admin';
    const PROFESOR_TYPE = 'profesor';
    const ALUMNO_TYPE = 'alumno';
    const DEFAULT_TYPE = 'default';

    public function isProfesor()    {
        return $this->type === self::PROFESOR_TYPE;
    }
    public function isAlumno()    {
        return $this->type === self::ALUMNO_TYPE;
    }
    public function isAdmin()    {
        return $this->type === self::ADMIN_TYPE;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function alumno()
    {
        return $this->hasOne('navegadorcito\Alumno', 'user_id', 'id');
    }
    public function profesor()
    {
        return $this->hasOne('navegadorcito\Profesor', 'user_id', 'id');
    }

}
