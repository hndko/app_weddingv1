<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = [
            'komentar' => Message::count(),
            'hadir' => Message::where('attendance', 'Hadir')->count(),
            'tidak_hadir' => Message::where('attendance', 'Tidak Hadir')->count(),
            'gallery' => Gallery::count(),
            'messages' =>  Message::latest()->get()
        ];

        return view('home', compact('data'));
    }
}
