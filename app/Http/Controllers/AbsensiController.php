<?php
namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Absensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            'jam_masuk' => 'required|date_format:H:i',
        ]);

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

    public function storejamkeluar(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'tanggal_absensi' => 'required|date',
            'jam_keluar' => 'required|date_format:H:i',
        ]);

        Absensi::where('user_id', $request->user_id)
            ->where('tanggal_absensi', $request->tanggal_absensi)
            ->update(['jam_keluar' => $request->jam_keluar]);

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
            'jam_lembur' => 'required|date_format:H:i',
        ]);

        Absensi::where('user_id', $request->user_id)
            ->where('tanggal_absensi', $request->tanggal_absensi)
            ->update(['jam_lembur' => $request->jam_lembur]);

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

        return redirect('/absensi')->with('success', 'Absensi berhasil diperbarui.');
    }

    // Delete absensi data
    public function destroy($id)
    {
        $absensi = Absensi::findOrFail($id);
        $absensi->delete();
        return redirect('/absensi')->with('success', 'Absensi berhasil dihapus.');
    }
}
