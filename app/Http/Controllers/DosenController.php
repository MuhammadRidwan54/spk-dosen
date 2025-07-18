<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\PendidikanTerakhir;
use App\Models\JabatanFungsional;
use App\Models\KuotaBimbingan;
use App\Models\BidangKeahlian;
use App\Models\Minat;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dosen = Dosen::with([
                'pendidikanTerakhir', 
                'jabatanFungsional', 
                'kuotaBimbingan',
                'bidangKeahlian',
                'minat'
            ])
            ->orderBy('nama')
            ->get();
        
        $pendidikan = PendidikanTerakhir::orderBy('score', 'desc')->get();
        $jabatan = JabatanFungsional::orderBy('score', 'desc')->get();
        $kuota = KuotaBimbingan::orderBy('score', 'desc')->get();
        $bidangKeahlian = BidangKeahlian::all();
        $minat = Minat::all();
        
        return view('dosen.index', compact('dosen', 'pendidikan', 'jabatan', 'kuota', 'bidangKeahlian', 'minat'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pendidikan = PendidikanTerakhir::orderBy('score', 'desc')->get();
        $jabatan = JabatanFungsional::orderBy('score', 'desc')->get();
        $kuota = KuotaBimbingan::orderBy('score', 'desc')->get();
        $bidangKeahlian = BidangKeahlian::all();
        $minat = Minat::all();
        
        return view('dosen.create', compact('pendidikan', 'jabatan', 'kuota', 'bidangKeahlian', 'minat'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nik' => 'required|string|unique:dosen,nik',
            'pendidikan_terakhir_id' => 'required|exists:pendidikan_terakhir,id',
            'jabatan_fungsional_id' => 'required|exists:jabatan_fungsional,id',
            'kuota_bimbingan_id' => 'required|exists:kuota_bimbingan,id',
            'bidang_keahlian_id' => 'required|exists:bidang_keahlian,id',
            'minat_id' => 'required|exists:minat,id'
        ]);

        Dosen::create($validated);
        
        return redirect()->route('dosen.index')
            ->with('success', 'Data dosen berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Dosen $dosen)
    {
        return view('dosen.show', compact('dosen'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dosen $dosen)
    {
        $pendidikan = PendidikanTerakhir::orderBy('score', 'desc')->get();
        $jabatan = JabatanFungsional::orderBy('score', 'desc')->get();
        $kuota = KuotaBimbingan::orderBy('score', 'desc')->get();
        $bidangKeahlian = BidangKeahlian::all();
        $minat = Minat::all();
        
        return view('dosen.edit', compact('dosen', 'pendidikan', 'jabatan', 'kuota', 'bidangKeahlian', 'minat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dosen $dosen)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nik' => 'required|string|unique:dosen,nik,' . $dosen->id_dosen . ',id_dosen',
            'pendidikan_terakhir_id' => 'required|exists:pendidikan_terakhir,id',
            'jabatan_fungsional_id' => 'required|exists:jabatan_fungsional,id',
            'kuota_bimbingan_id' => 'required|exists:kuota_bimbingan,id',
            'bidang_keahlian_id' => 'required|exists:bidang_keahlian,id',
            'minat_id' => 'required|exists:minat,id'
        ]);

        $dosen->update($validated);
        
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