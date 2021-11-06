<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Room;

class Desk extends Model
{
    use HasFactory;

    protected $fillable = ['room_id', 'price', 'size', 'position', 'is_taken'];

    public function room()
    {
    	return $this->belongsTo(Room::class);
    }

    public function user() {
        return $this->belongsTo('App\Models\User');
    }
}
