<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Event;
use App\Models\Message;
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
            'wedding' => Wedding::with(['groom', 'bride', 'stories', 'galleries', 'gifts', 'messages'])->first()
        ];

        return view('wedding.index', compact('data'));
    }

    public function storeMessage(Request $request)
    {
        $request->validate([
            'nama_tamu' => 'required|string|max:255',
            'kehadiran' => 'required|string',
            'ucapan' => 'required|string',
        ]);

        $wedding = Wedding::first();

        Message::create([
            'wedding_id' => $wedding->id,
            'guest_name' => $request->input('nama_tamu'),
            'attendance' => $request->input('kehadiran'),
            'message' => $request->input('ucapan'),
        ]);

        return redirect()->back()->with('success', 'Ucapan telah dikirim.');
    }
}
