<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Desk;
use App\Models\User;

class Room extends Model
{
    use HasFactory;

    protected $fillable = ['desk_capacity', 'size'];
    
    public function desks()
    {
    	return $this->hasMany(Desk::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
