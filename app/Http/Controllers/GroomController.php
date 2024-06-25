<?php

namespace App\Http\Controllers;

use App\Models\Groom;
use App\Models\Wedding;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class GroomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grooms = Groom::all();
        return view('dashboard.grooms.index', compact('grooms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $weddings = Wedding::all();
        return view('dashboard.grooms.create', compact('weddings'));
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
            'name' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required',
        ]);

        // Proses upload file gambar
        $imageName = time() . '.' . $request->image->getClientOriginalExtension();
        $request->image->move(public_path('assets/img'), $imageName); // Simpan ke public/assets/img

        // Simpan data ke dalam database menggunakan model Groom
        $groom = new Groom();
        $groom->wedding_id = $validatedData['wedding_id'];
        $groom->name = $validatedData['name'];
        $groom->image = 'assets/img/' . $imageName; // Simpan path gambar ke dalam field image
        $groom->description = $validatedData['description'];
        $groom->save();

        // Redirect dengan flash message jika berhasil disimpan
        return redirect()->route('grooms.index')->with('success', 'Groom berhasil ditambahkan.');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $groom = Groom::findOrFail($id);
        $weddings = Wedding::all();
        return view('dashboard.grooms.edit', compact('groom', 'weddings'));
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
            'name' => 'required',
            'description' => 'required',
        ]);

        $groom = Groom::findOrFail($id);

        // Update data groom berdasarkan ID
        $groom->wedding_id = $validatedData['wedding_id'];
        $groom->name = $validatedData['name'];

        // Jika ada file gambar baru diupload, proses file gambar
        if ($request->hasFile('image')) {
            // Validasi dan simpan gambar baru
            $request->validate([
                'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            // Hapus gambar lama jika ada
            if ($groom->image) {
                \File::delete(public_path($groom->image)); // Hapus file lama dari public path
            }

            // Simpan gambar baru ke dalam public path
            $imageName = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('assets/img'), $imageName);
            $groom->image = 'assets/img/' . $imageName;
        }

        $groom->description = $validatedData['description'];
        $groom->save();

        // Redirect dengan flash message jika berhasil diupdate
        return redirect()->route('grooms.index')->with('success', 'Groom berhasil diupdate.');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $groom = Groom::findOrFail($id);

        // Hapus gambar dari penyimpanan jika ada
        if ($groom->image) {
            $imagePath = public_path($groom->image); // Path absolut ke file gambar

            if (file_exists($imagePath)) {
                unlink($imagePath); // Hapus file dari sistem file
            }
        }

        // Hapus data groom berdasarkan ID
        $groom->delete();

        // Redirect dengan flash message jika berhasil dihapus
        return redirect()->route('grooms.index')->with('success', 'Groom berhasil dihapus.');
    }
}
