<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Teacher::class, 5)->create();

        factory(App\Student::class, 5)->create();
    }
}
