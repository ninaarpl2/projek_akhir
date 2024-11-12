<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $users = User::all();
        return view('pages.karyawan.karyawan',compact('users'));
    }

    public function create(){
        return view('pages.user.tambahuser');
    }

    public function store(Request $request){
        $request->validate([
            'name'              =>'required',
            'nis'               =>'required|unique',
            'email'             =>'required|email|unique:users,email',
            'jabatan'     => 'required',
            'jenis_kelamin'     => 'required',
            'alamat'            => 'required',
            'password'          => 'required|min:8|confirmed',
            'foto'              => 'required|image|mimes:jpeg,png,jpg'
        ]);


        if ($request->hasFile('foto')){
            $file  =$request ->file('foto');
            $fileName   = time() .'.'. $file->getClientOriginalExtension();
            $file ->move(public_path('foto'),$fileName);
        }


  
        $storeDatauser=[
            'nama'          => $request->nama,
            'nis'           => $request->nis,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat'        => $request->alamat,
            'email'         => $request->email,
            'password'      => bcrypt($request->password),
            'foto'           =>$filename
        ];
        User::create($storeDatauser);
        return redirect('/user')->route('pages.user.index')->with('success','User berhasil ditambahkan');
    }

    public function edit($id)
    {
        $dataUser = User::find($id);
        return view('pages.user.edituser', compact('dataUser'));
    }

    // Update the specified employee in the database
    public function update(Request $request, $id)
    {
         // Validasi input
         $request->validate([
        'nama'                 => 'required|max:255',
        'nis'                  => 'required|max:255|unique:users,nis',
        'email'                => 'required|email|max:255|unique:users,email',
        'jenis_kelamin'        => 'required',
        'alamat'               => 'required'
    ], [
        'nama.required'            => 'Nama harus diisi',
        'nama.max'                 => 'Nama maksimal 255 karakter',
        'nis.required'             => 'Nis harus diisi',
        'nis.max'                  => 'Nis maksimal 255 karakter',
        'nis.unique'               => 'Nis sudah ada',
        'email.required'           => 'Email harus diisi',
        'email.max'                => 'Email maksimal 255 karakter',
        'email.unique'             => 'Email sudah ada',
        'jenis_kelamin.required'   => 'Jenis kelamin harus diisi',
        'alamat.required'          => 'Alamat harus diisi'
    ]);

    // Menyiapkan data untuk di edit
    $editDataUser= [
        'nama'           => $request->nama,
        'nis'            => $request->nis,
        'email'          => $request->email,
        'jenis_kelamin'  => $request->jenis_kelamin,
        'alamat'         => $request->alamat
    ];

     $dataUser = User::find($id)->update($editDatauser);
     return redirect('/user');

}

    public function destroy($id)
    {
        User::destroy($id);
        return redirect()->route('user.index')->with('success', 'User berhasil dihapus.');
    }

}
