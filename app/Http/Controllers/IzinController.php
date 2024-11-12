<?php
namespace App\Http\Controllers;

use App\Models\Izin;
use App\Models\User;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IzinController extends Controller
{
    // Menampilkan daftar izin
    public function index()
    {
        $kategori = Kategori::all();
        $izins = Izin::with('petugas')->get(); // Load all izins with related petugas data

        return view('pages.izin.dataizin', compact('izins', 'kategori'));
    }


    // Menampilkan form untuk menambah izin
    public function create()
    {
        $kategoris = Kategori::all();
        $izins = Izin::all();
        return view('pages.izin.tambahizin', compact('izins','kategoris'));
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


    public function tambahketerangan($id)
    {
        $users = User::all();
        $izin = Izin::find($id);

        if (!$izin) {
            return redirect()->back()->with('error', 'Data izin tidak ditemukan.');
        }

        return view('pages.izin.keterangan', compact('users', 'izin'));
    }

    public function storeketerangan(Request $request, $id)
    {
        $request->validate([
            'petugas_id' => 'required',
            'status'     => 'required|in:pending,diterima,ditolak',
        ],[
            'petugas_id.required' => 'Data petugas harus diisi sesuai admin.',
            'status.required'     => 'Status harus diisi sesuai opsi.',
        ]);

        $izin = Izin::find($id);
        if (!$izin) {
            return redirect()->back()->with('error', 'Data izin tidak ditemukan.');
        }

        $izin->update([
            'petugas_id' => Auth::user()->id, // Ensure it uses the authenticated user's ID
            'status'     => $request->status,
        ]);

        return redirect('/izin')->with('berhasil', 'Data izin berhasil diperbarui.');
    }



    public function detailizin($id){
        $izin = Izin::find($id);
        return view('pages.izin.detailizin',compact('izin'));
    }






    // Menampilkan form untuk mengedit izin
    public function edit(Izin $izin,$id)
    {
        $users = User::where('role','user')->get(); // Mengambil semua data pengguna
        $petugas = User::where('role', 'admin')->get(); // Mengambil data petugas dengan peran admin
        $izins = Izin::findOrFail($id);

        return view('pages.izin.editizin', compact('izin', 'users', 'petugas','izins'));
    }

    // Menyimpan perubahan izin
    public function updateizin(Request $request,$id)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'petugas_id' => 'required|exists:users,id', // Validasi bahwa petugas adalah bagian dari tabel users
            'kategoriabsen' => 'required|in:sakit,izin',
            'tanggal_izin' => 'required|date',
            'tanggal_masuk' => 'required|date',
            'alasan_izin' => 'required|string|max:255',
        ]);

        $izin = Izin::findOrFail($id);
        $izin->update([
            'user_id' => $request->user_id,
            'petugas_id' => $request->petugas_id,
            'kategoriizin_id' => $request->kategoriizin_id, // Pastikan ini mengacu pada kolom yang benar
            'tanggal_izin' => $request->tanggal_izin,
            'tanggal_masuk' => $request->tanggal_masuk,
            'alasan_izin' => $request->alasan_izin,
        ]);

        return redirect('/izin')->with('success', 'Izin berhasil diperbarui.');
    }


    // Menghapus izin
    public function destroy(Izin $izin)
    {
        $izin->delete();
        return redirect()->route('izins.index')->with('success', 'Izin berhasil dihapus.');
    }
}
