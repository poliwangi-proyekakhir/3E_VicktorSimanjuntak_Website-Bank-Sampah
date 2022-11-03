<?php

namespace App\Http\Controllers;

use App\LayananService;
use App\Pelanggan;
use App\Produk;
use App\SetorSampah;
use App\Sparepart;
use App\Supplier;
use App\Transaksi;
use App\TransaksiToko;
use App\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $pelanggan = count(User::where('role','warga')->get());
        $produk = count(Produk::all());
        $setor = 0;
        if (Auth::user()->role=='admin') {
            $setor = count(SetorSampah::all());
        }else{
            $setor = count(SetorSampah::where('warga_id', Auth::user()->id)->get());
        }
        $request = $setor;
        $transaksi = 0;
        if (Auth::user()->role=='admin') {
            $transaksi = count(TransaksiToko::all());
        }else{
            $transaksi = count(TransaksiToko::where('warga_id', Auth::user()->id)->get());
        }
        $user =User::find(Auth::user()->id);
        $saldo = $user->saldo;
      
        return view('admin.dashboard', compact('pelanggan', 'produk', 'setor', 'request','transaksi','saldo'));
    }
}
