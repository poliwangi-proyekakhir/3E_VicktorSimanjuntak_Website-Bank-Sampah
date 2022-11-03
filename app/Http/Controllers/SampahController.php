<?php

namespace App\Http\Controllers;

use App\Sampah;
use Illuminate\Http\Request;

class SampahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pagename = 'Data Sampah';
        $data = Sampah::all();
        return view('sampah.index', compact('pagename', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $pagename = 'Tambah Data Sampah';
        return view('sampah.create', compact('pagename'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nama' => 'required',
            'harga' => 'required',
            'deskripsi' => 'required',
            'satuan' => 'required',
            'jenis_sampah' => 'required',
        ]);

        $data = new Sampah(
            [
                'nama' => $request->get('nama'),
                'harga' => $request->get('harga'),
                'deskripsi' => $request->get('deskripsi'),
                'satuan' => $request->get('satuan'),
                'jenis_sampah' => $request->get('jenis_sampah'),
            ]
        );

        if ($request->hasFile('images')) {
            $request->file('images')->move('images/', $request->file('images')->getClientOriginalName());
            $data->gambar = $request->file('images')->getClientOriginalName();
        }
        $data->save();
        return redirect('home/sampah')->with('success', 'Data Sampah Ditambahkan');
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
        //
        $pagename = 'Edit Data Sampah';
        $data = Sampah::find($id);
        return view('sampah.edit', compact('pagename', 'data'));
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
        //

        $request->validate([
            'nama' => 'required',
            'harga' => 'required',
            'deskripsi' => 'required',
            'satuan' => 'required',
            'jenis_sampah' => 'required',
        ]);
        $data = Sampah::find($id);


        $data->nama = $request->get('nama');
        $data->harga = $request->get('harga');
        $data->deskripsi = $request->get('deskripsi');
        $data->satuan = $request->get('satuan');
        $data->jenis_sampah = $request->get('jenis_sampah');


        if ($request->hasFile('images')) {
            $request->file('images')->move('images/', $request->file('images')->getClientOriginalName());
            $data->gambar = $request->file('images')->getClientOriginalName();
        }
        $data->save();
        return redirect('home/sampah')->with('success', 'Data Sampah Diperbaruhi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        $data = Sampah::find($id);
        $data->delete();
        return redirect('home/sampah')->with('success', 'Data Sampah Dihapus');
    }
}
