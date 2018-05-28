<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Teacher;
use App\Student;
use App\Task;
use App\Assignment;
use App\Group;
use Auth;
use App\Repositories\TaskRepository;
use App\Http\Requests\TaskRequest;
use Carbon\Carbon;
use Hash;
use Storage;


class TasksController extends Controller
{
	protected $task;

	public function __construct(Task $task){
		$this->task = new TaskRepository($task);
	}

	public function myTasks(){
		$teacher = Teacher::where('user_id', Auth::user()->id)->first();


		if($teacher){
			$tasks = Task::orderBy('created_at', 'desc')
			->where('teacher_id', $teacher->id)
			->get();
			
		} else{
			$student = Student::where('user_id', Auth::user()->id)->first();

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

	public function create(TaskRequest $request){

		$task = $this->task->create( $request->only(['title', 'description', 'audiofile']) );
		
		$this->task->setModel($task);
		$filename = $this->task->getModel()->audiofile;

		$request->audiofile->storeAs('', $filename, 'google');
		return redirect()->route('mytasks');
	}

	public function show($id){
		$task = $this->task->show($id);

		return view('tasks.show', compact('task'));
	}

	public function delete($id){
		$this->task->delete($id);

		return redirect()->route('mytasks');
	}

	public function getAudio(Request $request){

		$task = Task::find($request->id);
		$this->task->setModel($task);
		$filename = $this->task->getModel()->audiofile;

		$dir = '/';
		$recursive = false; // Get subdirectories also?
		$contents = collect(Storage::cloud()->listContents($dir, $recursive));
		$file = $contents
			->where('type', '=', 'file')
			->where('filename', '=', pathinfo($filename, PATHINFO_FILENAME))
			->where('extension', '=', pathinfo($filename, PATHINFO_EXTENSION))
			->first(); // there can be duplicate file names!
		
		$rawData = Storage::cloud()->get($file['path']);
		return response($rawData, 200)
			->header('ContentType', $file['mimetype'])
			->header('Content-Disposition', "attachment; filename='$filename'");
	}
}
