<?php

namespace App\Http\Controllers;

use App\Group;
use App\Teacher;
use App\Student;
use Auth;
use Illuminate\Http\Request;
use App\Repositories\GroupRepository;
use App\Http\Requests\GroupRequest;

class GroupsController extends Controller
{
    protected $group;

    public function __construct(Group $group){
        $this->group = new GroupRepository($group);
    }

    public function index(){
    	$groups = Group::orderBy('created_at', 'desc')->get();
    	
    	return view('groups.index', compact('groups'));
    }

    public function myGroups(){
        $teacher = Teacher::where('user_id', Auth::user()->id)->first();


        if($teacher){
            $groups = Group::orderBy('created_at', 'desc')
            ->where('teacher_id', $teacher->id)
            ->get();
            
        } else{
            $student = Student::where('user_id', Auth::user()->id)->first();

            $groups = $student->groups;
        }

        return view('groups.mygroups', compact('groups'));
    }

    public function show($id)
    {
        $group = $this->group->show($id);

    	return view('groups.show', compact('group'));
    }

    public function search(Request $request){
        $q = $request->q;

        $groups = Group::where('discipline', 'like',
            '%' . $q . '%')
            ->orWhere('description', 'like',
            '%' . $q . '%')
            ->orWhereHas('teacher', function($queryTeacher) use ($q) {
                $queryTeacher->whereHas('user', function($queryUser) use ($q) { 
                    $queryUser->where('name', 'like', '%' . $q . '%');
                });
            })
            ->get();

        return view('groups.index', compact('groups', 'q'));
    }

    public function create(GroupRequest $request){
        $this->group->create($request->only(['discipline', 'description', 'teaher_id']));

        return redirect()->route('mygroups');
    }

    public function delete($id){
        $this->group->delete($id);

        return redirect()->home();
    }

    public function join($id){
        $group = $this->group->show($id);

        Auth::user()->student->groups()->save($group);
        return redirect()->home();
    }

    public function leave($id){
        Auth::user()->student->groups()->detach($id);
        return redirect()->home();
    }
}
