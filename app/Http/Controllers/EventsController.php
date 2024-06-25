<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class EventsController extends Controller
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
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'events' => Event::all()
        ];

        return view('dashboard.events.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Periksa apakah sudah ada 2 event dalam database
        $eventCount = Event::count();

        if ($eventCount >= 2) {
            return redirect()->route('events.index')->with('error', 'Tidak dapat menambahkan event baru karena sudah ada 2 event.');
        }

        return view('dashboard.events.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data yang diterima dari form
        $validatedData = $request->validate([
            'name' => 'required',
            'start_time' => 'required',
            'end_time' => 'nullable',
            'date' => 'required|date',
            'location_name' => 'required',
            'address' => 'required',
        ]);

        // Periksa apakah sudah ada 2 event dalam database
        $eventCount = Event::count();

        if ($eventCount >= 2) {
            return redirect()->route('events.index')->with('error', 'Tidak dapat menambahkan event baru karena sudah ada 2 event.');
        }

        // Simpan data ke dalam database menggunakan model Event
        Event::create($validatedData);

        // Redirect dengan flash message jika berhasil disimpan
        return redirect()->route('events.index')->with('success', 'Event berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $event = Event::findOrFail($id); // Cari event berdasarkan ID

        return view('dashboard.events.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validasi data yang diterima dari form
        $validatedData = $request->validate([
            'name' => 'required',
            'start_time' => 'required',
            'end_time' => 'nullable',
            'date' => 'required|date',
            'location_name' => 'required',
            'address' => 'required',
        ]);

        // Update data event berdasarkan ID
        Event::whereId($id)->update($validatedData);

        // Redirect dengan flash message jika berhasil diupdate
        return redirect()->route('events.index')->with('success', 'Event berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Hapus data event berdasarkan ID
        Event::destroy($id);

        // Redirect dengan flash message jika berhasil dihapus
        return redirect()->route('events.index')->with('success', 'Event berhasil dihapus.');
    }
}
