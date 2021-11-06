<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Desk;

class DesksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $desks = array(
            ['room_id' => 1, 'price' => 5, 'size' => 4.2, 'position' => 'next to the window', 'is_taken' => false],
            ['room_id' => 2, 'price' => 4, 'size' => 3.2, 'position' => 'next to the door', 'is_taken' => false],
            ['room_id' => 2, 'price' => 3, 'size' => 6.2, 'position' => 'next to the window', 'is_taken' => true],
            ['room_id' => 1, 'price' => 4.5, 'size' => 7, 'position' => 'centre', 'is_taken' => true]
        );

        foreach ($desks as $desk)
        {
            $desk = new Desk($desk);
            $desk->save();
        }
    }
}
