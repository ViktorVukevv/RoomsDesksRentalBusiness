<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Desk;

class DesksTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */

    public function test_create()
    {
        $desk = new Desk([
            'is_taken' => 100,
            'price' => 200.00,
            'size' => 3.2,
            'position' => 'next to the window'
        ]);
        $desk->save();

        $desk = Desk::findOrFail($desk->id);

        $this->assertEquals(3.2, $desk->size);
    }
    
    public function testDeskPriceUpdating()
    {
        $desk = new Desk([
            'is_taken' => 100,
            'price' => 200.00,
            'size' => 'medium',
            'position' => 'next to the window'
        ]);
        $desk->save();

        $desk = Desk::findOrFail($desk->id);

        $desk->price = 150.00;

        $desk->save();

        $this->assertEquals(150, $desk->price);
    }
}
