<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new App\User([
            'password' => '$2y$10$iAyH0IGUm4IZmArOgp6VGe4rfcAw1e.R3n304LRPuk7jdg7HgJgQ2',
            'email' => 'guarnieri007@hotmail.com',
            'name' => 'Felipe Guarnieri',
        ]);
        $user->save();
    }
}
