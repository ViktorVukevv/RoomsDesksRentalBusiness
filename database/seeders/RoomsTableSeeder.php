<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Room;

class RoomsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rooms = array(
            ['desk_capacity' => 12, 'size' => 150, 'room_manager' => 1],
            ['desk_capacity' => 20, 'size' => 180, 'room_manager' => 2],
            ['desk_capacity' => 10, 'size' => 100, 'room_manager' => 3]
        );

        foreach ($rooms as $room)
        {
            $room = new Room($room);
            $room->save();
        }
    }
}
