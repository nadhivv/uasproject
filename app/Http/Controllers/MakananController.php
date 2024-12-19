<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Makanan;
use App\Models\Orders;
use App\Models\Photos;

class MakananController extends Controller
{
    public function index()
    {
        //$makanan = Makanan::all();
        $makanan = Makanan::with('photos')->get();
        return view('admin.makanan.index', compact('makanan'));
    }

    public function create()
    {
        return view('admin.makanan.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'nama_makanan' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $makanan = Makanan::create([
            'nama_makanan' => $request->nama_makanan,
            'harga' => $request->harga,
        ]);

        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('images', 'public');
            $makanan->photo = basename($photoPath);
            $makanan->save();

            Photos::create([
                'makanan_id' => $makanan->id,
                'photo_url' => $photoPath,
                'penginapan_id' => $request->penginapan_id ?? null,
            ]);
        }
        $makanan->save();

        return redirect()->route('admin.makanan.index')->with('success', 'Menu makanan berhasil ditambahkan!');
    }

    public function edit($makananId)
    {
        $makanan = Makanan::findOrFail($makananId);
        return view('admin.makanan.edit', compact('makanan'));
    }

    public function update(Request $request, $makananId)
    {
        $makanan = Makanan::findOrFail($makananId);
        $request->validate([
            'nama_makanan' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
        ]);

        $makanan->nama_makanan = $request->nama_makanan;
        $makanan->harga = $request->harga;
        $makanan->save();

        return redirect()->route('admin.makanan.index')->with('success', 'Menu makanan berhasil diperbarui!');
    }

    public function destroy($makananId)
    {
        $makanan = Makanan::findOrFail($makananId);
        $makanan->delete();
        Photos::where('makanan_id', $makananId)->delete();

        return redirect()->route('admin.makanan.index')->with('success', 'Makanan berhasil dihapus');
    }
}
