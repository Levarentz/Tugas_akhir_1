<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function daftarKaryawan(Request $request){
        if(Auth::check()){
            echo "selamat datang".$request->user()->name;
        }else{
            echo "silahkan login terlebih dahulu";
        }
        // echo Auth::user()->id."<br>";
        // echo Auth::user()->name."<br>";
        // echo Auth::user()->email."<br>";
        // echo Auth::user()->password."<br>";
        // return view('halaman',['judul' => 'Daftar karyawan']);
    }

    public function tabelKaryawan(){
        return view('halaman',['judul' => 'Tabel Karyawan']);
    }

    public function blogKaryawan(){
        return view('halaman',['judul' => 'Blog Karyawan']);
    }
}
