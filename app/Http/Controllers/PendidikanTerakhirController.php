<?php

namespace App\Http\Controllers;

use App\Models\PendidikanTerakhir;
use Illuminate\Http\Request;

class PendidikanTerakhirController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pendidikan = PendidikanTerakhir::all();
        return view('pendidikan-terakhir.index', compact('pendidikan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pendidikan-terakhir.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'pendidikan' => 'required|string|max:255',
            'score' => 'required|integer|min:1|max:2'
        ]);

        PendidikanTerakhir::create($request->all());
        return redirect()->route('pendidikan-terakhir.index')
            ->with('success', 'Data pendidikan terakhir berhasil ditambahkan.');
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
    public function edit(PendidikanTerakhir $pendidikanTerakhir)
    {
        return view('pendidikan-terakhir.edit', compact('pendidikanTerakhir'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PendidikanTerakhir $pendidikanTerakhir)
    {
        $request->validate([
            'pendidikan' => 'required|string|max:255',
            'score' => 'required|integer|min:1|max:2'
        ]);

        $pendidikanTerakhir->update($request->all());
        return redirect()->route('pendidikan-terakhir.index')
            ->with('success', 'Data pendidikan terakhir berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PendidikanTerakhir $pendidikanTerakhir)
    {
        $pendidikanTerakhir->delete();
        return redirect()->route('pendidikan-terakhir.index')
            ->with('success', 'Data pendidikan terakhir berhasil dihapus.');
    }
}
