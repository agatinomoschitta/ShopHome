<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\CanResetPassword as 
CanResetPasswordContract;
class User extends Model implements Authenticatable, CanResetPasswordContract
{
    use \Illuminate\Notifications\Notifiable;
    use AuthenticableTrait, CanResetPassword;
    protected $fillable = ['name', 
        'contactNumber', 
        'password', 
        'surname', 
        'address', 
        'cap', 
        'country', 
        'city', 
        'state'];
}
