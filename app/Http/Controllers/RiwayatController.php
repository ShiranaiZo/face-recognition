<?php

namespace App\Http\Controllers;

use App\Model\Riwayat;
use App\Model\Databarang;
use Illuminate\Http\Request;

class RiwayatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $results['riwayats'] = Riwayat::latest()->get();
        return view('riwayats.index', $results);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

        foreach ($data['idbarang'] as $key_idbarang => $idbarang) {
            $riwayat = Riwayat::create([
                'idpegawai' => $data['idpegawai'],
                'idbarang' => $idbarang,
                'kodebarang' => $data['kodebarang'][$key_idbarang],
                'tujuan' => $data['tujuan'],
                'jumlah' => $data['jumlah'][$key_idbarang],
                'tgl_awal' => yyyymmdd_now()
            ]);

            $barang = Databarang::find($idbarang);

            $barang->update([
                'jumlah' => $barang->jumlah - $data['jumlah'][$key_idbarang]
            ]);
        }

        return redirect('')->with('success', 'Data berhasil di simpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Riwayat  $riwayat
     * @return \Illuminate\Http\Response
     */
    public function show(Riwayat $riwayat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Riwayat  $riwayat
     * @return \Illuminate\Http\Response
     */
    public function edit(Riwayat $riwayat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Riwayat  $riwayat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Riwayat $riwayat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Riwayat  $riwayat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Riwayat $riwayat)
    {
        //
    }
}
