<?php

namespace App\Http\Controllers;

use App\Models\Bride;
use App\Models\Wedding;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\File;

class BrideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brides = Bride::all();
        return view('dashboard.brides.index', compact('brides'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $weddings = Wedding::all();
        return view('dashboard.brides.create', compact('weddings'));
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

        // Simpan data ke dalam database menggunakan model Bride
        $bride = new Bride();
        $bride->wedding_id = $validatedData['wedding_id'];
        $bride->name = $validatedData['name'];
        $bride->image = 'assets/img/' . $imageName; // Simpan path gambar ke dalam field image
        $bride->description = $validatedData['description'];
        $bride->save();

        // Redirect dengan flash message jika berhasil disimpan
        return redirect()->route('brides.index')->with('success', 'Bride berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bride = Bride::findOrFail($id);
        $weddings = Wedding::all();
        return view('dashboard.brides.edit', compact('bride', 'weddings'));
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

        $bride = Bride::findOrFail($id);

        // Update data bride berdasarkan ID
        $bride->wedding_id = $validatedData['wedding_id'];
        $bride->name = $validatedData['name'];

        // Jika ada file gambar baru diupload, proses file gambar
        if ($request->hasFile('image')) {
            // Validasi dan simpan gambar baru
            $request->validate([
                'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            // Hapus gambar lama jika ada
            if ($bride->image) {
                $imagePath = public_path($bride->image); // Path absolut ke file gambar

                if (file_exists($imagePath)) {
                    unlink($imagePath); // Hapus file dari sistem file
                }
            }

            // Simpan gambar baru ke dalam public path
            $imageName = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('assets/img'), $imageName);
            $bride->image = 'assets/img/' . $imageName;
        }

        $bride->description = $validatedData['description'];
        $bride->save();

        // Redirect dengan flash message jika berhasil diupdate
        return redirect()->route('brides.index')->with('success', 'Bride berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bride = Bride::findOrFail($id);

        // Hapus gambar dari penyimpanan jika ada
        if ($bride->image) {
            $imagePath = public_path($bride->image); // Path absolut ke file gambar

            if (file_exists($imagePath)) {
                unlink($imagePath); // Hapus file dari sistem file
            }
        }

        // Hapus data bride berdasarkan ID
        $bride->delete();

        // Redirect dengan flash message jika berhasil dihapus
        return redirect()->route('brides.index')->with('success', 'Bride berhasil dihapus.');
    }
}
