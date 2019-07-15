<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    protected $fillable = ['name', 'startHour', 'finalHour', 'period'];

    public function schedule() 
    {
        return $this->belongsToMany(Customer::class, 'schedule_session', 'customer_id')
        ->withPivot('routine_id', 'session_id', 'session_date')
        ->withTimestamps();
    }
}
