<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DasboardController extends Controller
{
    //
    public function index(){
        $totalKaryawan = User::count();

        return view('pages.dasboard.index',compact('totalKaryawan'));
    }
}
