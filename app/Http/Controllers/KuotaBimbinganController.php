<?php

namespace App\Http\Controllers;

use App\Models\KuotaBimbingan;
use Illuminate\Http\Request;

class KuotaBimbinganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kuota = KuotaBimbingan::all();
        return view('kuota-bimbingan.index', compact('kuota'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kuota-bimbingan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kategori' => 'required|string|max:255',
            'range' => 'required|string|max:255',
            'score' => 'required|integer|min:1|max:3'
        ]);

        KuotaBimbingan::create($request->all());
        return redirect()->route('kuota-bimbingan.index')
            ->with('success', 'Kuota Bimbingan berhasil ditambahkan.');
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
    public function edit(KuotaBimbingan $kuotaBimbingan)
    {
        return view('kuota-bimbingan.edit', compact('kuotaBimbingan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, KuotaBimbingan $kuotaBimbingan)
    {
        $request->validate([
            'kategori' => 'required|string|max:255',
            'range' => 'required|string|max:255',
            'score' => 'required|integer|min:1|max:3'
        ]);

        $kuotaBimbingan->update($request->all());
        return redirect()->route('kuota-bimbingan.index')
            ->with('success', 'Kuota Bimbingan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KuotaBimbingan $kuotaBimbingan)
    {
        $kuotaBimbingan->delete();
        return redirect()->route('kuota-bimbingan.index')
            ->with('success', 'Kuota Bimbingan berhasil dihapus.');
    }
}
