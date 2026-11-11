<?php

namespace App\Http\Controllers;

use App\Models\BahanPembersih;
use Illuminate\Http\Request;

class BahanPembersihController extends Controller
{
    public function index()
    {
        $list_bahan = BahanPembersih::orderBy('id', 'desc')->get();
        return view('bahan.index', compact('list_bahan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_bahan' => 'required',
            'kategori' => 'required',
            'merek' => 'required',
            'stok' => 'required|numeric',
            'satuan' => 'required',
            'nama_supplier' => 'required',
        ]);

        BahanPembersih::updateOrCreate(
            ['id' => $request->id],
            [
                'nama_bahan' => $request->nama_bahan,
                'kategori' => $request->kategori,
                'merek' => $request->merek,
                'stok' => $request->stok,
                'satuan' => $request->satuan,
                'nama_supplier' => $request->nama_supplier,
            ]
        );

        return redirect()->route('bahan.index');
    }

    public function edit($id)
    {
        $list_bahan = BahanPembersih::orderBy('id', 'desc')->get();
        $edit_data = BahanPembersih::findOrFail($id);
        return view('bahan.index', compact('list_bahan', 'edit_data'));
    }

  public function destroy($id)
{
    // Cek apakah yang login bukan admin
    if (auth()->user()->role !== 'admin') {
        return redirect()->back()->with('error', 'Maaf, Petugas tidak boleh menghapus data!');
    }

    \App\Models\BahanPembersih::destroy($id);
    return redirect()->route('bahan.index');
}
}