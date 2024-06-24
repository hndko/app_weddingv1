<?php

namespace App\Models;

use App\Models\Wedding;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Gift extends Model
{
    use HasFactory;

    protected $fillable = ['wedding_id', 'bank_name', 'account_number', 'account_name', 'qr_code_image'];

    public function wedding()
    {
        return $this->belongsTo(Wedding::class);
    }
}
