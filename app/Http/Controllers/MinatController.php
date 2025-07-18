<?php

namespace App\Http\Controllers;

use App\Models\Minat;
use Illuminate\Http\Request;

class MinatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $minat = Minat::all();
        return view('minat.index', compact('minat'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('minat.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255'
        ]);

        Minat::create($request->all());
        return redirect()->route('minat.index')
            ->with('success', 'Minat berhasil ditambahkan.');
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
    public function edit(Minat $minat)
    {
        return view('minat.edit', compact('minat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Minat $minat)
    {
        $request->validate([
            'nama' => 'required|string|max:255'
        ]);

        $minat->update($request->all());
        return redirect()->route('minat.index')
            ->with('success', 'Minat berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Minat $minat)
    {
        $minat->delete();
        return redirect()->route('minat.index')
            ->with('success', 'Minat berhasil dihapus.');
    }
}
