<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
	protected $fillable = [
		'group_id', 'task_id', 'deadline', 'assignment_date'
	];

	public function group()
	{
		return $this->belongsTo(Group::class);
	}

	public function task()
	{
		return $this->belongsTo(Task::class);
	}

	public function solution()
	{
		return $this->hasMany(Solutions::class);
	}
}
