<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Room;

class RoomsTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */

    public function testRoomManagerShouldBeTheAdmin_IfNoRoomManagerIdIsGiven()
    {
        $room = new Room([
            'desk_capacity' => 100,
            'size' => 'medium'
        ]);
        $room->save();

        $room2 = Room::findOrFail($room->id);

        $this->assertEquals('1', $room2->room_manager);
    }
    
    public function testRoomSizeUpdating()
    {
        $room = new Room([
            'desk_capacity' => 100,
            'size' => 'medium'
        ]);
        $room->save();

        $room = Room::findOrFail($room->id);

        $room->size = 'large';

        $room->save();

        $this->assertEquals('large', $room->size);
    }
}
