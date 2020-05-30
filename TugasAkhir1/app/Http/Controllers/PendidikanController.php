<?php

namespace App\Http\Controllers;

use App\Pendidikan;
use Illuminate\Http\Request;

class PendidikanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pendidikan = Pendidikan::all();
        return view('data.pendidikan.index', ['pendidikan' => $pendidikan]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('data.pendidikan.create');
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
            'pendidikan_karyawan' => 'required',
            ]);
            $pendidikan = Pendidikan::create($validateData);
            session()->flash('pesan', "Data {$pendidikan->pendidikan_karyawan} Berhasil Ditambahkan");
            return redirect('/pendidikans');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pendidikan  $pendidikan
     * @return \Illuminate\Http\Response
     */
    public function show(Pendidikan $pendidikan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pendidikan  $pendidikan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pendidikan $pendidikan)
    {
        return view('data.pendidikan.edit', ['pendidikan' => $pendidikan]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pendidikan  $pendidikan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pendidikan $pendidikan)
    {
        $validateData = $request->validate([
            'pendidikan_karyawan' => 'required'
        ]);
        $pendidikan->update($validateData);
        session()->flash('pesan', "Data {$pendidikan->pendidikan_karyawan} Berhasil Di Edit");
        return redirect()->route("pendidikans.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pendidikan  $pendidikan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pendidikan $pendidikan)
    {
        $pendidikan->find($pendidikan->id)->delete();
        session()->flash('pesan', "Data {$pendidikan->pendidikan_karyawan} Berhasil Dihapus");
        return redirect()->route('pendidikans.index');
    }
}
