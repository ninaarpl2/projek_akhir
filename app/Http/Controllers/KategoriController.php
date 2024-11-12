<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    // Display a list of all categories
    public function index()
    {
        $kategoris = Kategori::all();
        return view('pages.kategori.kategoriizin', compact('kategoris'));
    }


        public function create()
        {
            return view('pages.kategori.tambahkategori');
        }

        public function store(Request $request)
        {
            $request->validate([
                'nama_kategori' => 'required|string|max:255',
                'deskripsi' => 'nullable|string|max:255',
            ]);

            Kategori::create([
                'nama_kategori' => $request->input('nama_kategori'),
                'deskripsi' => $request->input('deskripsi'),
            ]);

            return redirect('/kategori')->with('success', 'Kategori berhasil ditambahkan.');
        }


    // Show the form for editing an existing category
    public function edit($id)
    {
        $kategori = Kategori::findOrFail($id);
        return view('', compact('kategori'));
    }

    // Update the category in the database
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255',
            'deskripsi' => 'required|string',
        ]);

        $kategori = Kategori::findOrFail($id);
        $kategori->update($request->all());

        return redirect()->route('')->with('success', 'Kategori berhasil diperbarui.');
    }

    // Delete a category from the database
    public function destroy($id)
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();

        return redirect()->route('')->with('success', 'Kategori berhasil dihapus.');
    }
}
