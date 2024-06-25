<?php

namespace App\Http\Controllers;

use App\Models\Gift;
use App\Models\Wedding;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class GiftController extends Controller
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
        $gifts = Gift::all();
        return view('dashboard.gifts.index', compact('gifts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $weddings = Wedding::all();
        return view('dashboard.gifts.create', compact('weddings'));
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
            'bank_name' => 'required',
            'account_number' => 'required',
            'account_name' => 'required',
            'qr_code_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Proses upload file gambar
        $imageName = time() . '.' . $request->qr_code_image->getClientOriginalExtension();
        $request->qr_code_image->move(public_path('assets/img'), $imageName); // Simpan ke public/assets/img

        // Simpan data ke dalam database menggunakan model Gift
        $gift = new Gift();
        $gift->wedding_id = $validatedData['wedding_id'];
        $gift->bank_name = $validatedData['bank_name'];
        $gift->account_number = $validatedData['account_number'];
        $gift->account_name = $validatedData['account_name'];
        $gift->qr_code_image = 'assets/img/' . $imageName; // Simpan path gambar ke dalam field qr_code_image
        $gift->save();

        // Redirect dengan flash message jika berhasil disimpan
        return redirect()->route('gifts.index')->with('success', 'Gift berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gift = Gift::findOrFail($id);
        $weddings = Wedding::all();
        return view('dashboard.gifts.edit', compact('gift', 'weddings'));
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
            'bank_name' => 'required',
            'account_number' => 'required',
            'account_name' => 'required',
        ]);

        $gift = Gift::findOrFail($id);

        // Update data gift berdasarkan ID
        $gift->wedding_id = $validatedData['wedding_id'];
        $gift->bank_name = $validatedData['bank_name'];
        $gift->account_number = $validatedData['account_number'];
        $gift->account_name = $validatedData['account_name'];

        // Jika ada file gambar baru diupload, proses file gambar
        if ($request->hasFile('qr_code_image')) {
            // Validasi dan simpan gambar baru
            $request->validate([
                'qr_code_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            // Hapus gambar lama jika ada
            if ($gift->qr_code_image) {
                \File::delete(public_path($gift->qr_code_image)); // Hapus file lama dari public path
            }

            // Simpan gambar baru ke dalam public path
            $imageName = time() . '.' . $request->qr_code_image->getClientOriginalExtension();
            $request->qr_code_image->move(public_path('assets/img'), $imageName);
            $gift->qr_code_image = 'assets/img/' . $imageName;
        }

        $gift->save();

        // Redirect dengan flash message jika berhasil diupdate
        return redirect()->route('gifts.index')->with('success', 'Gift berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gift = Gift::findOrFail($id);

        // Hapus gambar dari penyimpanan jika ada
        if ($gift->qr_code_image) {
            $imagePath = public_path($gift->qr_code_image); // Path absolut ke file gambar

            if (file_exists($imagePath)) {
                unlink($imagePath); // Hapus file dari sistem file
            }
        }

        // Hapus data gift berdasarkan ID
        $gift->delete();

        // Redirect dengan flash message jika berhasil dihapus
        return redirect()->route('gifts.index')->with('success', 'Gift berhasil dihapus.');
    }
}
