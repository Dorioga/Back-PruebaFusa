<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;


class Persona extends Model implements Authenticatable
{
    use HasFactory, HasApiTokens;

    protected $table ="Persona";
    protected $primaryKey = 'cedula';

    protected $fillable=['cedula','nombre','apellidos','email','direccion','telefono','fecha_nac','tipo_doc','contraseña'];
    

    
    public function getAuthIdentifierName()
    {
        return 'cedula';
    }

    public function getAuthIdentifier()
    {
        
        return $this->attributes['cedula'];
    }

    public function getAuthPassword()
    {
        return $this->attributes['contraseña'];
    }

    public function getRememberToken()
    {
        return $this->attributes[$this->getRememberTokenName()];
    }

    public function setRememberToken($value)
    {
        $this->attributes[$this->getRememberTokenName()] = $value;
    }

    public function getRememberTokenName()
    {
        return 'remember_token';
    }
}
