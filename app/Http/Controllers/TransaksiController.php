<?php

namespace App\Http\Controllers;

use App\Produk;
use App\TransaksiToko;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pagename = 'Riwayat Transaksi';
      
        if (Auth::user()->role=='admin') {
            $data = TransaksiToko::all();
            return view('transaksi.index',compact('pagename','data'));
        }else {
            $data = TransaksiToko::where('warga_id', Auth::user()->id)->get();
            return view('transaksi.index',compact('pagename','data'));
        }

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
        //
        $user = User::find(Auth::user()->id);
        $produk = Produk::find($request->get('produk_id'));
        $total = $request->get('qty') * $produk->harga;

        if ($user->saldo < $total  ) {
            return redirect('home/produk')->with('error','Saldo Anda Tidak Cukup');
        }else{
            $user->saldo = $user->saldo - $total;
            $user->save();
        }


        $data = new TransaksiToko([
            "warga_id" => $user->id,
            'produk_id' => $request->get('produk_id'),
            'kuantitas_produk' => $request->get('qty'),
            'total' => $total,
        ]);
        if ($produk->stok - $request->get('qty') < 0) {
            return redirect('home/produk')->with('error','Stok tidak cukup');
        }
        $produk->stok = $produk->stok - $request->get('qty');
        $produk->save();
        $data->save();
        return redirect('home/transaksi')->with('success','Berhasil Membeli Produk');
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
        $data = TransaksiToko::find($id);
        $data->delete();
        return redirect('home/transaksi')->with('success','Data Berhasil Dihapus');   
    }
}
