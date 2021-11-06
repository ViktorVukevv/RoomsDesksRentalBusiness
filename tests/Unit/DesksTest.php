<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\Desk;

class DesksTest extends TestCase
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

    public function test_create()
    {
        $desk = new Desk([
            'is_taken' => 100,
            'price' => 200.00,
            'size' => 'medium',
            'position' => 'next to the window'
        ]);
        $desk->save();

        $desk = Desk::findOrFail($desk->id);

        $this->assertEquals('medium', $desk->size);
    }
}
