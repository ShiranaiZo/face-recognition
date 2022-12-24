<?php

namespace App\Http\Controllers;

use App\Model\Daftar_pegawai;
use Illuminate\Http\Request;

class DaftarPegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $results['daftar_pegawai'] = Daftar_pegawai::latest()->get();

        return view('daftar_pegawai.index', $results);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('daftar_pegawai.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->except('_method', '_token');

        $daftar_pegawai = Daftar_pegawai::create($data);

        return redirect('daftar-pegawai')->with('success', 'Daftar Pegawai Tersimpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $result['daftar_pegawai'] = Daftar_pegawai::find($id);

        return view('daftar_pegawai.edit', $result);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->except('_method', '_token');

        $daftar_pegawai = Daftar_pegawai::find($id)->update($data);

        return redirect('daftar-pegawai')->with('success', 'Daftar Pegawai Terubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pegawai = Daftar_pegawai::find($id)->delete();

        return redirect('daftar-pegawai')->with('success', 'Pegawai Dihapus!');
    }
}
