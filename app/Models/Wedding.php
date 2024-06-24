<?php

namespace App\Models;

use App\Models\Bride;
use App\Models\Groom;
use App\Models\Story;
use App\Models\Gallery;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Wedding extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'groom_name',
        'bride_name',
        'wedding_date',
        'invitation_message',
        'quran_verse',
    ];

    public function groom()
    {
        return $this->hasOne(Groom::class);
    }

    public function bride()
    {
        return $this->hasOne(Bride::class);
    }

    public function stories()
    {
        return $this->hasMany(Story::class);
    }

    public function galleries()
    {
        return $this->hasMany(Gallery::class);
    }
}
