<?php

namespace App\Http\Controllers;

use App\Karyawan;
use App\Telepon;
use App\Bagian;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $karyawans = Karyawan::all();
        return view('karyawan.index', compact('karyawans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $bagians = Bagian::all();
        return view('karyawan.create',compact('bagians'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // batasi hak akses
        $this->authorize('create', karyawan::class);


        $validatedData = $request->validate([
            'nik'=>'required|size:8|unique:karyawans',
            'nama'=>'required|min:3|max:50',
            'harga'=>'required',
            'image'=>'required',
            'bagian_id' => 'required'
        ]);
        $validatedData['image']= $request->file('image')->store('assets/gallery','public');
        Karyawan::create($validatedData);
        $request->session()->flash('pesan', "Data {$validatedData['nama']} Berhasil Disimpan");
        return redirect()->route('karyawans.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function show(Karyawan $karyawan)
    {
        return view('karyawan.show', compact('karyawan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
     

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function edit(Karyawan $karyawan){
        return view('karyawan.edit', compact('karyawan'));
    }
    public function update(Request $request, Karyawan $karyawan)
    {
        $validatedData = $request->validate([
            'nik' => 'required|size:8|unique:karyawans,nik,'.$karyawan->id,
            'nama' => 'required|min:3|max:50',
            'jenis_kelamin' => 'required|in:P,L',
            'bagian' => 'required',
            'alamat' => ''
        ]);
        $karyawan->update($validatedData);
        $telepon = $karyawan->telepon;
        $telepon->nomer_telepon = $request->input('nomer_telepon');
        $karyawan->telepon()->save($telepon);
        return redirect()->route('karyawans.show', ['karyawan'=> $karyawan->id])->with('pesan', "Update Data {$validatedData['nama']} Berhasil");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Karyawan $karyawan)
    {
        $karyawan->delete();
        return redirect()->route('karyawan.index')->with('hapus', "Hapus Data $karyawan->nama Berhasil");
    }
}
