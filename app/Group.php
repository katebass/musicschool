<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Group extends Model
{
    protected $fillable = [
        'discipline', 'description'
    ];

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

    public function containsStudent(){
        // $ans = $this->whereHas('students', function($stud){
        //     $stud->where('studentsid', Auth::user()->student->id);
        // })->first();
        $ans = $this->students->contains(Auth::user()->student->id);
        //dd($ans);
        if($ans){
            return true;
        }
        return false;
    }

}
