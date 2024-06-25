<?php

namespace App\Http\Controllers;

use App\Models\Story;
use App\Models\Wedding;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class StoryController extends Controller
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
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stories = Story::all();
        return view('dashboard.stories.index', compact('stories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $weddings = Wedding::all();
        return view('dashboard.stories.create', compact('weddings'));
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
            'title' => 'required',
            'date' => 'required|date',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Proses upload file gambar
        $imageName = time() . '.' . $request->image->getClientOriginalExtension();
        $request->image->move(public_path('assets/img'), $imageName); // Simpan ke public/assets/img

        // Simpan data ke dalam database menggunakan model Story
        $story = new Story();
        $story->wedding_id = $validatedData['wedding_id'];
        $story->title = $validatedData['title'];
        $story->date = $validatedData['date'];
        $story->description = $validatedData['description'];
        $story->image = 'assets/img/' . $imageName; // Simpan path gambar ke dalam field image
        $story->save();

        // Redirect dengan flash message jika berhasil disimpan
        return redirect()->route('stories.index')->with('success', 'Story berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $story = Story::findOrFail($id);
        $weddings = Wedding::all();
        return view('dashboard.stories.edit', compact('story', 'weddings'));
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
            'title' => 'required',
            'date' => 'required|date',
            'description' => 'required',
        ]);

        $story = Story::findOrFail($id);

        // Update data story berdasarkan ID
        $story->wedding_id = $validatedData['wedding_id'];
        $story->title = $validatedData['title'];
        $story->date = $validatedData['date'];
        $story->description = $validatedData['description'];

        // Jika ada file gambar baru diupload, proses file gambar
        if ($request->hasFile('image')) {
            // Validasi dan simpan gambar baru
            $request->validate([
                'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            // Hapus gambar lama jika ada
            if ($story->image) {
                \File::delete(public_path($story->image)); // Hapus file lama dari public path
            }

            // Simpan gambar baru ke dalam public path
            $imageName = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('assets/img'), $imageName);
            $story->image = 'assets/img/' . $imageName;
        }

        $story->save();

        // Redirect dengan flash message jika berhasil diupdate
        return redirect()->route('stories.index')->with('success', 'Story berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $story = Story::findOrFail($id);

        // Hapus gambar dari penyimpanan jika ada
        if ($story->image) {
            $imagePath = public_path($story->image); // Path absolut ke file gambar

            if (file_exists($imagePath)) {
                unlink($imagePath); // Hapus file dari sistem file
            }
        }

        // Hapus data story berdasarkan ID
        $story->delete();

        // Redirect dengan flash message jika berhasil dihapus
        return redirect()->route('stories.index')->with('success', 'Story berhasil dihapus.');
    }
}
