<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function students()
    {
        return $this->belongsToMany(Student::class);
    }

    public function assignments()
    {
        return $this->hasMany(Assignment::class);
    }
}
