<?php

namespace App\Http\Controllers;

use App\Karyawan;
use App\Jabatan;
use App\Status;
use App\Pendidikan;
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
        $karyawan = Karyawan::all();
        return view('data.index', ['karyawan' => $karyawan]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jabatans = Jabatan::all();
        $statuses = Status::all();
        $pendidikans = Pendidikan::all();
        return view('data.create', compact('jabatans','statuses','pendidikans'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nama' => 'required|min:3|max:50',
            'gender' => 'required',
            'no_tlp' => 'required|unique:karyawans',
            'jabatan_id' => 'required',
            'status_id' => 'required',
            'pendidikan_id' => 'required',
            'tgl_masuk' => 'required',
            'alamat' => 'required',
            'umur' => 'required',
            'tgl_lahir' => 'required'
            ]);
            $karyawan = Karyawan::create($validateData);
            session()->flash('pesan', "Data {$karyawan->nama} Berhasil Ditambahkan");
            return redirect('/karyawans');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function show(Karyawan $karyawan)
    {
        return view('data.show', ['karyawan' => $karyawan]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function edit(Karyawan $karyawan)
    {
        $jabatans = Jabatan::all();
        $statuses = Status::all();
        $pendidikans = Pendidikan::all();
        $karyawan->pendidikan_karyawan = $karyawan->pendidikan->pendidikan_karyawan;
        return view('data.edit', [
            'karyawan' => $karyawan,
            'jabatans' => $jabatans,
            'statuses' => $statuses,
            'pendidikans' => $pendidikans]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Karyawan $karyawan)
    {
        $validateData = $request->validate([
            'nama' => 'required|min:3|max:50',
            'gender' => 'required',
            'no_tlp' => 'required|unique:karyawans,no_tlp,' .$karyawan->id,
            'jabatan_id' => 'required',
            'status_id' => 'required',
            'pendidikan_id' => 'required',
            'tgl_masuk' => 'required',
            'alamat' => 'required',
            'umur' => 'required',
            'tgl_lahir' => 'required'
        ]);
        $karyawan->update($validateData);
        session()->flash('pesan', "Data {$karyawan->nama} Berhasil Di Edit");
        return redirect()->route("karyawans.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Karyawan $karyawan)
    {
        $karyawan->find($karyawan->id)->delete();
        session()->flash('pesan', "Data {$karyawan->nama} Berhasil Dihapus");
        return redirect()->route('karyawans.index');
    }
}
