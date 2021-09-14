<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Desk extends Model
{
    use HasFactory;

    protected $fillable = ['room_id', 'price', 'size', 'position', 'is_taken'];

    public function room()
    {
    	return $this->belongsTo(Room::class);
    }
}
