<?php

namespace App\Http\Controllers;

use App\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pagename = 'Data Produk';
        $data = Produk::all();
        return view('produk.index', compact('pagename', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $pagename = 'Tambah Data Produk';
        return view('produk.create', compact('pagename'));
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
            'stok' => 'required',
        ]);

        $data = new Produk(
            [
                'nama' => $request->get('nama'),
                'harga' => $request->get('harga'),
                'deskripsi' => $request->get('deskripsi'),
                'stok' => $request->get('stok'),
            ]
        );

        if ($request->hasFile('images')) {
            $request->file('images')->move('images/', $request->file('images')->getClientOriginalName());
            $data->gambar = $request->file('images')->getClientOriginalName();
        }
        $data->save();
        return redirect('home/produk')->with('success', 'Data Produk Ditambahkan');
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
        $data = Produk::find($id);
        $pagename = 'Edit Data Produk';
        return view('produk.edit', compact('pagename', 'data'));
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
            'stok' => 'required',
        ]);
        $data = Produk::find($id);

        $data->nama = $request->get('nama');
        $data->harga = $request->get('harga');
        $data->deskripsi = $request->get('deskripsi');
        $data->stok = $request->get('stok');


        if ($request->hasFile('images')) {
            $request->file('images')->move('images/', $request->file('images')->getClientOriginalName());
            $data->gambar = $request->file('images')->getClientOriginalName();
        }
        $data->save();
        return redirect('home/produk')->with('success', 'Data Produk Diperbaruhi');
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
    }
}
