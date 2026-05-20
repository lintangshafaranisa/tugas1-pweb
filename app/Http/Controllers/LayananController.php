<?php

namespace App\Http\Controllers;
use App\Models\Layanan;

use Illuminate\Http\Request;

class LayananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $layanan = Layanan::latest()->paginate(10);

        return view('layanan.index', compact('layanan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('layanan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([

            'nama_layanan' => 'required|min:3',

            'harga' => 'required|numeric',

            'durasi' => 'required',

            'foto' => 'nullable|image|mimes:jpg,png|max:2048'

        ]);

        if ($request->hasFile('foto')) {

            $validated['foto'] = $request->file('foto')
                ->store('layanan', 'public');
        }

        Layanan::create($validated);

        return redirect()->route('layanan.index')
            ->with('success', 'Layanan berhasil ditambahkan');
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
    public function edit(Layanan $layanan)
    {
        return view('layanan.edit', compact('layanan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Layanan $layanan)
    {
        $validated = $request->validate([

            'nama_layanan' => 'required|min:3',

            'harga' => 'required|numeric',

            'durasi' => 'required',

            'foto' => 'nullable|image|mimes:jpg,png|max:2048'

        ]);

        if ($request->hasFile('foto')) {

            $validated['foto'] = $request->file('foto')
                ->store('layanan', 'public');
        }

        $layanan->update($validated);

        return redirect()->route('layanan.index')
            ->with('success', 'Layanan berhasil diupdate');
    }

    public function search(Request $request)
    {
        $search = $request->search;

        $layanan = Layanan::where(
            'nama_layanan',
            'like',
            "%$search%"
        )->get();

        return response()->json($layanan);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Layanan $layanan)
    {
        $layanan->delete();

        return redirect()->route('layanan.index')
            ->with('success', 'Layanan berhasil dihapus');
    }
}
