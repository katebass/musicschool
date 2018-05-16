<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function assignments()
    {
        return $this->hasMany(Assignment::class);
    }

}
