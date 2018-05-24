<?php 

namespace App\Repositories;

use App\Task;
use Auth;
use Carbon\Carbon;
use Hash;

class TaskRepository extends Repository{

	public function create($array){
		$task = new Task;

		$task->title = $array['title'];
		$task->description = $array['description'];
		
		$file = Hash::make(Auth::user()->id).Carbon::now();
		$task->audiofile = $file;

		Auth::user()->teacher->tasks()->save($task);

		$task->save();

		return $task;
	}
}