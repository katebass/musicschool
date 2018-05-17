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
        factory(App\User::class, 2)->create()
            ->each(function ($u) {
                for($i = 0; $i<3; $i++) {
                    $u->teachers()->save(factory(App\Teacher::class)->create());
                }
            });

        factory(App\User::class, 5)->create()
            ->each(function ($u) {
                for($i = 0; $i<3; $i++) {
                    $u->students()->save(factory(App\Student::class)->create());
                }
            });

    }
}
