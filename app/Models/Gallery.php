<?php

namespace App\Models;

use App\Models\Wedding;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = ['wedding_id', 'image'];

    public function wedding()
    {
        return $this->belongsTo(Wedding::class);
    }
}
