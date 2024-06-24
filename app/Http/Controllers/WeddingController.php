<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Event;
use App\Models\Wedding;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class WeddingController extends Controller
{
    public function index()
    {
        Carbon::setLocale('id');

        $data = [
            'events' => Event::all(),
            'wedding' => Wedding::with(['groom', 'bride', 'stories', 'galleries', 'gifts'])->first()
        ];

        return view('wedding.index', compact('data'));
    }
}
