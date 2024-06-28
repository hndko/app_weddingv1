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
            'wedding' => Wedding::with([
                'groom',
                'bride',
                'stories',
                'galleries',
                'gifts',
                'messages' => function ($query) {
                    $query->orderBy('created_at', 'desc');
                }
            ])->first()
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

        // Check if the guest has already submitted a message
        $existingMessage = Message::where('wedding_id', $wedding->id)
            ->where('guest_name', $request->input('nama_tamu'))
            ->first();

        if ($existingMessage) {
            return response()->json([
                'status' => 'error',
                'message' => 'Anda sudah mengirim pesan sebelumnya.'
            ], 400);
        }

        Message::create([
            'wedding_id' => $wedding->id,
            'guest_name' => $request->input('nama_tamu'),
            'attendance' => $request->input('kehadiran'),
            'message' => $request->input('ucapan'),
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Ucapan telah dikirim.'
        ], 200);
    }

    public function getMessages()
    {
        $messages = Message::orderBy('created_at', 'desc')->get();

        return response()->json($messages);
    }
}
