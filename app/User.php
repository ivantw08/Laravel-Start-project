<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Delatbabel\Elocrypt\Elocrypt;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
class User extends \Eloquent implements Authenticatable
{
    use AuthenticableTrait;

    use Elocrypt;

   // protected $encrypts = ['password','city','address','app_id'];
    protected $table = 'user';
    protected $fillable = ['name','email','password','level','app_id','city','address','remember_token'];
}
