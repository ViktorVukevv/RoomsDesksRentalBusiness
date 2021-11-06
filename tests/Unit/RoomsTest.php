<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\Room;

class RoomsTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->assertTrue(true);
    }

    public function testRoomManagerShouldBeTheAdmin_IfNoRoomManagerIdIsGiven()
    {
        $room = new Room([
            'desk_capacity' => 100,
            'size' => 'medium'
        ]);
        $room->save();

        $room2 = Room::findOrFail($room->id);

        $this->assertEquals('1', $room2->user_id);
    }
}
