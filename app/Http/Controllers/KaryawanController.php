<?php
namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\User;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    // Display the list of employees


    public function index()
    {
        $users = User::where('role', 'user')->get();
        return view('pages.karyawan.karyawan', compact('users'));
    }

    public function karyawan()
    {
        $users = User::all();
        return view('pages.karyawan.karyawan', compact('users'));
    }

    // Show the form for creating a new employee
    public function create()
    {
        $users = User::all();
        return view('pages.karyawan.tambahkaryawan', compact('users'));
    }

    // Store a newly created employee in the database
    public function store(Request $request)
    {
        // Validasi input
    $request->validate([
        'nama'           => 'required|max:255',
        'nis'            => 'required|max:255',
        'email'          => 'required',
        'jabatan'        => 'required',
        'jenis_kelamin'  => 'required',
        'alamat'         => 'required',
    ], [
        'nama.required'           => 'Nama harus diisi',
        'nama.max'                => 'Nama maksimal 255 karakter',
        'nis.required'            => 'Nis harus diisi',
        'nis.max'                 => 'Nis maksimal 255 karakter',
        'email.required'          => 'Email harus diisi',
        'jabatan.required'        => 'Jabatan harus diisi',
        'jenis_kelamin.required'  => 'Jenis kelamin harus diisi',
        'alamat.required'         => 'Alamat harus diisi'
    ]);

    // Menyiapkan data untuk disimpan
    $storeDataUser = [
        'nama'           => $request->nama,
        'nis'            => $request->nis,
        'email'          => $request->email,
        'jabatan'        => $request->jabatan,
        'jenis_kelamin'  => $request->jenis_kelamin,
        'password'      => bcrypt($request->password),
        'alamat'         => $request->alamat
    ];

    // Menyimpan data karyawan ke database
    User::create($storeDataUser);

    // Redirect kembali ke halaman index dengan pesan sukses
    return redirect('/karyawan')->with('success', 'karyawan berhasil ditambahkan.');
}



    // Show the form for editing the specified employee
    public function edit($id)
    {
        $dataKaryawan = user::find($id);
        return view('pages.karyawan.editkaryawan', compact('dataKaryawan'));
    }

    // Update the specified employee in the database
    public function update(Request $request, $id)
    {
         // Validasi input
         $request->validate([
        'nama'           => 'required|max:255',
        'nis'            => 'required|max:255',
        'email'          => 'required',
        'jabatan'        => 'required',
        'jenis_kelamin'  => 'required',
        'alamat'         => 'required',
    ], [
        'nama.required'           => 'Nama harus diisi',
        'nama.max'                => 'Nama maksimal 255 karakter',
        'nis.required'            => 'Nis harus diisi',
        'nis.max'                 => 'Nis maksimal 255 karakter',
        'email.required'          => 'Email harus diisi',
        'jabatan.required'        => 'Jabatan harus diisi',
        'jenis_kelamin.required'  => 'Jenis kelamin harus diisi',
        'alamat.required'         => 'Alamat harus diisi'
    ]);

    // Menyiapkan data untuk di edit
    $storeDataUser = [
        'nama'           => $request->nama,
        'nis'            => $request->nis,
        'email'          => $request->email,
        'jabatan'        => $request->jabatan,
        'jenis_kelamin'  => $request->jenis_kelamin,
        'alamat'         => $request->alamat
    ];


     $dataKaryawan = user::find($id)->update($storeDataUser);
     return redirect('/karyawan');

}

    // Remove the specified employee from the database
    public function destroy($id)
    {
       $users = user::find($id);

       $users->delete();

        return redirect('/karyawan');
    }
}
