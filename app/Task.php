<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
	protected $fillable = [
		'title', 'description', 'audiofile'
	];
	
	public function teacher()
	{
		return $this->belongsTo(Teacher::class);
	}

	public function assignments()
	{
		return $this->hasMany(Assignment::class);
	}

}
