<?php

namespace App\Http\Controllers;

use App\Solution;
use App\Teacher;
use App\Student;
use App\Group;
use App\Assignment;
use App\Task;
use Auth;
use Illuminate\Http\Request;
use App\Repositories\SolutionRepository;
use App\Http\Requests\SolutionRequest;
use Carbon\Carbon;

class SolutionsController extends Controller
{
    public function mySolutions(){
		$teacher = Teacher::where('user_id', Auth::user()->id)->first();

		if($teacher){
			$solutions = Solution::whereHas('assignment', function($assignQuery){
				$assignQuery->whereHas('task', function($groupQuery){
					$groupQuery->whereHas('teacher', function($teacherQuery){
						$teacherQuery->where('user_id', Auth::user()->id);
					});
				});
			})->get();

			
		} else{
			$solutions = Solution::whereHas('assignment', function($assignQuery){
				$assignQuery->whereHas('group', function($groupQuery){
					$groupQuery->whereHas('students', function($studentQuery){
						$studentQuery->where('user_id', Auth::user()->id);
					});
				});
			})->get();
		}

		return view('solutions.mysolutions', compact('solutions'));
	}


}
