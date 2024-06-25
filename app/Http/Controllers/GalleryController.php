<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Wedding;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class GalleryController extends Controller
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
        $galleries = Gallery::all();
        return view('dashboard.galleries.index', compact('galleries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $weddings = Wedding::all();
        return view('dashboard.galleries.create', compact('weddings'));
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
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Proses upload file gambar
        $imageName = time() . '.' . $request->image->getClientOriginalExtension();
        $request->image->move(public_path('assets/img'), $imageName); // Simpan ke public/assets/img

        // Simpan data ke dalam database menggunakan model Gallery
        $gallery = new Gallery();
        $gallery->wedding_id = $validatedData['wedding_id'];
        $gallery->image = 'assets/img/' . $imageName; // Simpan path gambar ke dalam field image
        $gallery->save();

        // Redirect dengan flash message jika berhasil disimpan
        return redirect()->route('galleries.index')->with('success', 'Gallery berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gallery = Gallery::findOrFail($id);
        $weddings = Wedding::all();
        return view('dashboard.galleries.edit', compact('gallery', 'weddings'));
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
        ]);

        $gallery = Gallery::findOrFail($id);

        // Update data gallery berdasarkan ID
        $gallery->wedding_id = $validatedData['wedding_id'];

        // Jika ada file gambar baru diupload, proses file gambar
        if ($request->hasFile('image')) {
            // Validasi dan simpan gambar baru
            $request->validate([
                'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            // Hapus gambar lama jika ada
            if ($gallery->image) {
                File::delete(public_path($gallery->image)); // Hapus file lama dari public path
            }

            // Simpan gambar baru ke dalam public path
            $imageName = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('assets/img'), $imageName);
            $gallery->image = 'assets/img/' . $imageName;
        }

        $gallery->save();

        // Redirect dengan flash message jika berhasil diupdate
        return redirect()->route('galleries.index')->with('success', 'Gallery berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gallery = Gallery::findOrFail($id);

        // Hapus gambar dari penyimpanan jika ada
        if ($gallery->image) {
            $imagePath = public_path($gallery->image); // Path absolut ke file gambar

            if (file_exists($imagePath)) {
                unlink($imagePath); // Hapus file dari sistem file
            }
        }

        // Hapus data gallery berdasarkan ID
        $gallery->delete();

        // Redirect dengan flash message jika berhasil dihapus
        return redirect()->route('galleries.index')->with('success', 'Gallery berhasil dihapus.');
    }
}
