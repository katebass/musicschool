<?php 

namespace App\Repositories;

use App\Group;
use App\Teacher;
use App\Task;
use App\Assignment;
use App\Solution;
use Hash;
use Carbon\Carbon;
use Auth;

class SolutionRepository extends Repository{
	
	public function create($array){

		$assignment = Assignment::whereHas('group', function($groupQuery) {
				$groupQuery->whereHas('students', function ($studentQuery) {
					$studentQuery->where('students.user_id', Auth::id());
				});
			})->whereHas('task', function($taskQuery) use ($array) {
					$taskQuery->where('id', $array['id']);
				})->first();

		$solution = new Solution;

		$solution->description = $array['description'];
		$solution->handover_date = Carbon::now();

		$file = Hash::make(Auth::user()->id.Carbon::now());
		$solution->audiofile = $file;

		$solution->assignment()->associate($assignment);
		Auth::user()->student->solutions()->save($solution);

		$solution->save();

		return $solution;
	}
}