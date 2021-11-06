<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = array(
            ['name' => 'Viktor', 'email' => 'vikivukev@gmail.com', 'password' => bcrypt('123456'), 'role' => 'admin'],
            ['name' => 'Ivan', 'email' => 'ivancho@gmail.com', 'password' => bcrypt('123456')],
            ['name' => 'Maria', 'email' => 'mariika@gmail.com', 'password' => bcrypt('123456')],
            ['name' => 'Pesho', 'email' => 'pesho@gmail.com', 'password' => bcrypt('123456')]
        );

        foreach ($users as $user)
        {
            $user = new User($user);
            $user->save();
        }
    }
}
