<?php

namespace App\Http\Controllers;

use App\Models\Wedding;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class WeddingsController extends Controller
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
        $weddings = Wedding::all();
        return view('dashboard.weddings.index', compact('weddings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.weddings.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'groom_name' => 'required',
            'bride_name' => 'required',
            'wedding_date' => 'required|date',
            'invitation_message' => 'required',
            'quran_verse' => 'nullable',
        ]);

        Wedding::create($validatedData);

        return redirect()->route('weddings.index')->with('success', 'Wedding data successfully added.');
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
        $wedding = Wedding::findOrFail($id);
        return view('dashboard.weddings.edit', compact('wedding'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'groom_name' => 'required',
            'bride_name' => 'required',
            'wedding_date' => 'required|date',
            'invitation_message' => 'required',
            'quran_verse' => 'nullable',
        ]);

        Wedding::whereId($id)->update($validatedData);

        return redirect()->route('weddings.index')->with('success', 'Wedding data successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Wedding::destroy($id);

        return redirect()->route('weddings.index')->with('success', 'Wedding data successfully deleted.');
    }
}
