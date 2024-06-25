<?php

namespace App\Models;

use App\Models\Wedding;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Message extends Model
{
    use HasFactory;

    protected $fillable = ['wedding_id', 'guest_name', 'attendance', 'message'];

    public function wedding()
    {
        return $this->belongsTo(Wedding::class);
    }
}
