<?php

namespace App\Http\Controllers;
use App\Group;

use Illuminate\Http\Request;

class GroupsController extends Controller
{
    public function index(){
    	$groups = Group::orderBy('created_at', 'desc')->get();
    	
    	return view('groups.index', compact('groups'));
    }

    public function show($id)
    {
        $group = Group::find($id);

    	return view('groups.show', compact('group'));
    }
}
