<?php 

namespace App\Repositories;

class GroupRepository extends Repository{

}

// Group::where('description', 'like', %$searchquery%)
//	->orWhere('name', 'like', ...)->orWhereHas('teacher', 
//	function($query) use ($searchquery) {
//		$query->where('name', 'like', '%$searchname%');
//})->get();
//
//