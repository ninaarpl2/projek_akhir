<?php
namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Absensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AbsensiController extends Controller
{
    public function index()
    {
        $absensis = Absensi::all();
        $users = User::all();
        return view('pages.absensi.absensi', compact('absensis', 'users'));
    }

    public function jammasuk()
    {
        return view('pages.absensi.tambahabsensi');
    }

    public function storejammasuk(Request $request)
{
    $request->validate([
        'user_id' => 'required|exists:users,id',
        'tanggal_absensi' => 'required|date',
    ]);

    // Menambahkan waktu saat ini ke jam_masuk (sekarang)
    $jamMasuk = Carbon::now()->format('H:i'); // format jam hanya 'H:i'

    // Menyimpan data absensi
    Absensi::create([
        'user_id' => $request->user_id,
        'tanggal_absensi' => $request->tanggal_absensi,
        'jam_masuk' => $request->jam_masuk,
    ]);

    return redirect('/absensi')->with('success', 'Absensi berhasil disimpan.');
}


    public function jamkeluar($id)
    {
        $absensi = Absensi::findOrFail($id);
        return view('pages.absensi.tambahjamkeluar', compact('absensi'));
    }

     // Pastikan Carbon sudah di-import di atas controller

    public function storejamkeluar(Request $request)
    {
        // Validasi data yang dikirimkan
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'tanggal_absensi' => 'required|date',
        ]);

        // Menetapkan waktu sekarang sebagai jam_keluar saat aksi submit dilakukan
        $jamKeluar = Carbon::now()->format('H:i');  // Mengambil waktu saat ini dalam format HH:MM (jam:menit)

        // Melakukan update dengan jam_keluar yang otomatis berdasarkan waktu saat ini
        Absensi::where('user_id', $request->user_id)
            ->where('tanggal_absensi', $request->tanggal_absensi)
            ->update(['jam_keluar' => $jamKeluar]);

        // Redirect ke halaman absensi dengan pesan sukses
        return redirect('/absensi')->with('success', 'Jam Keluar berhasil disimpan.');
    }


    public function jamlembur($id)
    {
        $absensi = Absensi::findOrFail($id);
        return view('pages.absensi.jamlembur', compact('absensi'));
    }

    public function storejamlembur(Request $request)
{
    $request->validate([
        'user_id' => 'required|exists:users,id',
        'tanggal_absensi' => 'required|date',
        // 'jam_lembur' dihilangkan dari validasi karena akan diatur otomatis
    ]);

    // Menetapkan waktu sekarang sebagai jam_lembur
    $jamLembur = Carbon::now()->format('H:i');  // Mengambil waktu saat ini dalam format HH:MM

    // Melakukan update dengan jam_lembur yang otomatis
    Absensi::where('user_id', $request->user_id)
        ->where('tanggal_absensi', $request->tanggal_absensi)
        ->update(['jam_lembur' => $jamLembur]);

    return redirect('/absensi')->with('success', 'Jam Lembur berhasil disimpan.');
}






    // Show edit form
    public function edit($id)
    {
        $absensi = Absensi::findOrFail($id);
        $users = User::all();
        return view('pages.absensi.editabsensi', compact('absensi', 'users'));
    }

    // Update absensi data
    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'tanggal_absensi' => 'required|date',
            'jam_masuk' => 'required|date_format:H:i',
            'jam_keluar' => 'required|date_format:H:i',
            'jam_lembur' => 'nullable|date_format:H:i',
        ]);

        $absensi = Absensi::findOrFail($id);
        $absensi->update([
            'user_id' => $request->user_id,
            'tanggal_absensi' => $request->tanggal_absensi,
            'jam_masuk' => $request->jam_masuk,
            'jam_keluar' => $request->jam_keluar,
            'jam_lembur' => $request->jam_lembur,
        ]);

        return redirect('/absensi')->with('success', 'Absensi berhasil diedit.');
    }

    // Delete absensi data
    public function destroy($id)
    {
        $absensi = Absensi::findOrFail($id);
        $absensi->delete();
        return redirect('/absensi')->with('success', 'Absensi berhasil dihapus.');
    }
}
