<?php
namespace App\Http\Controllers;

use App\Models\Izin;
use App\Models\User;
use App\Models\Petugas;
use App\Models\Kategori;
use Illuminate\Http\Request;

class IzinController extends Controller
{
    // Menampilkan daftar izin
    public function index()
    {
        $kategori = Kategori::all();
        $izins = Izin::all();  // Mengambil semua data izin
        return view('pages.izin.dataizin', compact('izins','kategori'));
    }

    // Menampilkan form untuk menambah izin
    public function create()
    {
        $kategori = Kategori::all();
        $izins = Izin::all();
        return view('pages.izin.tambahizin', compact('izins','kategori'));
    }

    public function storeIzin(Request $request)
    {
        // dd($request->all());
        $validatedData = $request->validate([
            'kategoriizin_id' => 'required',
            'tanggal_izin' => 'required|date',
            'tanggal_masuk' => 'required|date',
            'alasan_izin' => 'required|string|max:255',

        ]);

        $validatedData['status'] = 'pending';

        // Ensure user_id and petugas_id are set correctly.
        $validatedData['user_id'] = auth()->id(); // Get the authenticated user ID

        Izin::create($validatedData);

        return redirect('/izin')->with('success', 'Izin berhasil ditambahkan.');
    }

    // Menampilkan form untuk mengedit izin
    public function edit(Izin $izin)
    {
        $users = User::all();
        $petugas = Petugas::all();
        return view('izins.edit', compact('izin', 'users', 'petugas'));
    }

    // Menyimpan perubahan izin
    public function update(Request $request, Izin $izin)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'petugas_id' => 'required|exists:petugas,id',
            'kategoriabsen' => 'required|in:sakit,izin',
            'tanggal_izin' => 'required|date',
            'tanggal_masuk' => 'required|date',
            'alasan_izin' => 'required|string|max:255',
        ]);

        $izin->update($request->all());

        return redirect()->route('izins.index')->with('success', 'Izin berhasil diperbarui.');
    }

    // Menghapus izin
    public function destroy(Izin $izin)
    {
        $izin->delete();
        return redirect()->route('izins.index')->with('success', 'Izin berhasil dihapus.');
    }
}
