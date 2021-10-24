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
        $room = new Room ([
            'desk_capacity' => 12,
            'size' => 150,
            'room_manager' => 1
        ]);
        $room->save();

        $room = new Room ([
            'desk_capacity' => 20,
            'size' => 180,
            'room_manager' => 2
        ]);
        $room->save();

        $room = new Room ([
            'desk_capacity' => 10,
            'size' => 100,
            'room_manager' => 3
        ]);
        $room->save();
    }
}
