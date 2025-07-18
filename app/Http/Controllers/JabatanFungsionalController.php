<?php

namespace App\Http\Controllers;

use App\Models\JabatanFungsional;
use Illuminate\Http\Request;

class JabatanFungsionalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jabatan = JabatanFungsional::all();
        return view('jabatan-fungsional.index', compact('jabatan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jabatan-fungsional.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'jabatan' => 'required|string|max:255',
            'score' => 'required|integer|min:1|max:3'
        ]);

        JabatanFungsional::create($request->all());
        return redirect()->route('jabatan-fungsional.index')
            ->with('success', 'Jabatan Fungsional berhasil ditambahkan.');
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
    public function edit(JabatanFungsional $jabatanFungsional)
    {
        return view('jabatan-fungsional.edit', compact('jabatanFungsional'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, JabatanFungsional $jabatanFungsional)
    {
        $request->validate([
            'jabatan' => 'required|string|max:255',
            'score' => 'required|integer|min:1|max:3'
        ]);

        $jabatanFungsional->update($request->all());
        return redirect()->route('jabatan-fungsional.index')
            ->with('success', 'Jabatan Fungsional berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JabatanFungsional $jabatanFungsional)
    {
        $jabatanFungsional->delete();
        return redirect()->route('jabatan-fungsional.index')
            ->with('success', 'Jabatan Fungsional berhasil dihapus.');
    }
}
