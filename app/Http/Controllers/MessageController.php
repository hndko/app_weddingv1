<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Wedding;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messages = Message::all();
        return view('dashboard.messages.index', compact('messages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $weddings = Wedding::all();
        return view('dashboard.messages.create', compact('weddings'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validasi data yang diterima dari form
        $validatedData = $request->validate([
            'wedding_id' => 'required|exists:weddings,id',
            'guest_name' => 'required|string|max:255',
            'attendance' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Simpan data ke dalam database menggunakan model Message
        $message = new Message();
        $message->wedding_id = $validatedData['wedding_id'];
        $message->guest_name = $validatedData['guest_name'];
        $message->attendance = $validatedData['attendance'];
        $message->message = $validatedData['message'];
        $message->save();

        // Redirect dengan flash message jika berhasil disimpan
        return redirect()->route('messages.index')->with('success', 'Message berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $message = Message::findOrFail($id);
        $weddings = Wedding::all();
        return view('dashboard.messages.edit', compact('message', 'weddings'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validasi data yang diterima dari form
        $validatedData = $request->validate([
            'wedding_id' => 'required|exists:weddings,id',
            'guest_name' => 'required|string|max:255',
            'attendance' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        $message = Message::findOrFail($id);

        // Update data message berdasarkan ID
        $message->wedding_id = $validatedData['wedding_id'];
        $message->guest_name = $validatedData['guest_name'];
        $message->attendance = $validatedData['attendance'];
        $message->message = $validatedData['message'];
        $message->save();

        // Redirect dengan flash message jika berhasil diupdate
        return redirect()->route('messages.index')->with('success', 'Message berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $message = Message::findOrFail($id);

        // Hapus data message berdasarkan ID
        $message->delete();

        // Redirect dengan flash message jika berhasil dihapus
        return redirect()->route('messages.index')->with('success', 'Message berhasil dihapus.');
    }
}
