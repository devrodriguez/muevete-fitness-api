<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = ['name', 'last_name', 'password', 'email', 'age'];
    protected $hidden = ['password'];
}
