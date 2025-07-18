<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\PendidikanTerakhir;
use App\Models\JabatanFungsional;
use App\Models\KuotaBimbingan;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dosen = Dosen::with(['pendidikanTerakhir', 'jabatanFungsional', 'kuotaBimbingan'])->get();
        return view('dosen.index', compact('dosen'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pendidikan = PendidikanTerakhir::all();
        $jabatan = JabatanFungsional::all();
        $kuota = KuotaBimbingan::all();
        return view('dosen.create', compact('pendidikan', 'jabatan', 'kuota'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nik' => 'required|string|unique:dosen,nik',
            'pendidikan_terakhir_id' => 'required|exists:pendidikan_terakhir,id',
            'jabatan_fungsional_id' => 'required|exists:jabatan_fungsional,id',
            'kuota_bimbingan_id' => 'required|exists:kuota_bimbingan,id'
        ]);

        Dosen::create($request->all());
        return redirect()->route('dosen.index')
            ->with('success', 'Data dosen berhasil ditambahkan.');
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
    public function edit(Dosen $dosen)
    {
        $pendidikan = PendidikanTerakhir::all();
        $jabatan = JabatanFungsional::all();
        $kuota = KuotaBimbingan::all();
        return view('dosen.edit', compact('dosen', 'pendidikan', 'jabatan', 'kuota'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dosen $dosen)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nik' => 'required|string|unique:dosen,nik,' . $dosen->id_dosen . ',id_dosen',
            'pendidikan_terakhir_id' => 'required|exists:pendidikan_terakhir,id',
            'jabatan_fungsional_id' => 'required|exists:jabatan_fungsional,id',
            'kuota_bimbingan_id' => 'required|exists:kuota_bimbingan,id'
        ]);

        $dosen->update($request->all());
        return redirect()->route('dosen.index')
            ->with('success', 'Data dosen berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dosen $dosen)
    {
        $dosen->delete();
        return redirect()->route('dosen.index')
            ->with('success', 'Data dosen berhasil dihapus.');
    }
}
