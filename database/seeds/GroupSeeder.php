<?php

use Illuminate\Database\Seeder;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        factory(App\Group::class, 2)->create()
        	->each(function($group){
        		$students = factory(App\Student::class, 3)->create();
        		$group->students()->attach($students);
        	});
    }
}
