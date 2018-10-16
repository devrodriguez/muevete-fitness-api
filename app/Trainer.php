<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    protected $fillable = ['first_name', 'last_name', 'profession', 'image_url'];
    
    public function getFullNameAttribute() {

    }
}
