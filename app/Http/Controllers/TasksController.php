<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Teacher;
use App\Student;
use App\Task;
use App\Assignment;
use App\Group;
use Auth;

class TasksController extends Controller
{
	public function myTasks(){
		$teacher = Teacher::where('user_id', Auth::user()->id)->first();


		if($teacher){
			$tasks = Task::orderBy('created_at', 'desc')
			->where('teacher_id', $teacher->id)
			->get();
			
		} else{
			$student = Student::where('user_id', Auth::user()->id)->first();

			// $groups = $student->groups;
			// $assignments = Assignment::whereIn('group_id', $groups->pluck('id'));

			$tasks = Task::with('assignments.group.students')->
				whereHas('assignments', function($assignQuery){
					$assignQuery->whereHas('group', function($groupQuery){
						$groupQuery->whereHas('students', function($studentQuery){
							$studentQuery->where('user_id', Auth::user()->id);
						});
					});
			})->get();
			
		}

		return view('tasks.mytasks', compact('tasks'));
	}
}
