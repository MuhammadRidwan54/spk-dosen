<?php

namespace App\Http\Controllers;

use App\Models\BidangKeahlian;
use Illuminate\Http\Request;

class BidangKeahlianController extends Controller
{
    public function index()
    {
        $bidangKeahlian = BidangKeahlian::all();
        return view('bidang-keahlian.index', compact('bidangKeahlian'));
    }

    public function create()
    {
        return view('bidang-keahlian.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'bidang' => 'required|string|max:255'
        ]);

        BidangKeahlian::create($request->all());
        return redirect()->route('bidang-keahlian.index')
            ->with('success', 'Bidang Keahlian berhasil ditambahkan.');
    }

    public function edit(BidangKeahlian $bidangKeahlian)
    {
        return view('bidang-keahlian.edit', compact('bidangKeahlian'));
    }

    public function update(Request $request, BidangKeahlian $bidangKeahlian)
    {
        $request->validate([
            'bidang' => 'required|string|max:255'
        ]);

        $bidangKeahlian->update($request->all());
        return redirect()->route('bidang-keahlian.index')
            ->with('success', 'Bidang Keahlian berhasil diperbarui.');
    }

    public function destroy(BidangKeahlian $bidangKeahlian)
    {
        $bidangKeahlian->delete();
        return redirect()->route('bidang-keahlian.index')
            ->with('success', 'Bidang Keahlian berhasil dihapus.');
    }
}
