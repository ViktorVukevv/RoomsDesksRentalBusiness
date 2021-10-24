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
        $user = new User([
            'name' => 'Viktor',
            'email' => 'vikivukev@gmail.com',
            'password' => bcrypt('123456'),
            'role' => 'admin'
        ]);
        $user->save();

        $user = new User([
            'name' => 'Ivan',
            'email' => 'ivancho@gmail.com',
            'password' => bcrypt('123456'),
        ]);
        $user->save();

        $user = new User([
            'name' => 'Maria',
            'email' => 'mariika@gmail.com',
            'password' => bcrypt('123456'),
        ]);
        $user->save();
    }
}
