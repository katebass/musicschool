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

	protected $solution;

	public function __construct(Solution $solution){
		$this->solution = new SolutionRepository($solution);
	}

    public function mySolutions(){
		$teacher = Teacher::where('user_id', Auth::user()->id)->first();

		if($teacher){
			$solutions = Solution::orderBy('created_at', 'desc')
				->with('assignment.task')->whereHas('assignment', function($assignQuery){
				$assignQuery->whereHas('task', function($groupQuery){
					$groupQuery->whereHas('teacher', function($teacherQuery){
						$teacherQuery->where('user_id', Auth::user()->id);
					});
				});
			})->get();

			
		} else{
			$solutions = Solution::orderBy('created_at', 'desc')
				->with('assignment.task')->whereHas('assignment', function($assignQuery){
				$assignQuery->whereHas('group', function($groupQuery){
					$groupQuery->whereHas('students', function($studentQuery){
						$studentQuery->where('user_id', Auth::user()->id);
					});
				});
			})->get();
		}
		
		return view('solutions.mysolutions', compact('solutions'));
	}

	public function newSolution($taskid){

		return view('solutions.new', compact('taskid'));
	}

	public function create(SolutionRequest $request){
		$ary = $request->only(['description', 'audiofile']);
		$ary['id']  = $request->id;
		
		$this->solution->create( $ary );

		return redirect()->route('mysolutions');
	}

	public function updatemark($id, Request $request){
		$this->solution->update($request->only(['mark']), $id);
		
		return redirect()->route('mysolutions');
	}
}
