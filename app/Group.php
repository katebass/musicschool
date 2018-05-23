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
		$ans = $this->students->contains(Auth::user()->student->id);

		if($ans){
			return true;
		}
		return false;
	}

	public function belongsToTeacher(){
		$ans = $this->teacher->id;

		if($ans == Auth::user()->teacher->id){
			return true;
		}
		return false;
	}
}
