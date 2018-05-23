<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class)
            ->create([
                'email' => 'teacher@mail.ru',
                'password' => Hash::make('123456')
            ])
            ->teacher()
            ->save(factory(App\Teacher::class)->create());

        factory(App\User::class)
            ->create([
                'email' => 'student@mail.ru',
                'password' => Hash::make('123456')
            ])
            ->student()
            ->save(factory(App\Student::class)->create());


        //factory(App\Teacher::class, 2)->create();
        //factory(App\Student::class, 2)->create();
    }
}
