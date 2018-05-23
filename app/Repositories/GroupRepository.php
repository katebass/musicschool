<?php 

namespace App\Repositories;

use App\Group;
use App\Teacher;
use Auth;

class GroupRepository extends Repository{
	public function create($array){
		$group = new Group;

        $group->discipline = $array['discipline'];
        $group->description = $array['description'];
        Auth::user()->teacher->groups()->save($group);

        $group->save();

        return $group;
	}
}