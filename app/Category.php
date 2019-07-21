<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name'];
    protected $hidden = ['pivot'];

    public function routines()
    {
        return $this->belongsToMany(Routine::class, 'routine_category', 'category_id', 'routine_id');
    }
}
