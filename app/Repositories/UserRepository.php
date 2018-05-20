<?php

namespace App\Repositories;
use App\Http\Requests\SignupRequest;
use App\User;
use App\Student;
use App\Teacher;
use Hash;

class UserRepository extends Repository {

	public function createStudent($array){
		$student = new Student;
		$student->grade = $array['grade'];
		$this->model->student()->save($student);

		return $this->model;
	}

	public function createTeacher($array){
		$teacher = new Teacher;
		$teacher->experience = $array['experience'];
		$this->model->teacher()->save($teacher);

		return $this->model;
	}

	public function create($array) {
		return $this->model->create([
			'name' => $array['name'],
			'email' => $array['email'],
			'address' => $array['address'],
			'phone' => $array['phone'],
			'password' => Hash::make($array['password'])
		]);
	}

}