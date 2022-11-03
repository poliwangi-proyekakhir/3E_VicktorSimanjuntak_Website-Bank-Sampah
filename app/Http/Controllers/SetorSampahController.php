<?php

namespace App\Http\Controllers;

use App\RequestSetor;
use App\Sampah;
use App\SetorSampah;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SetorSampahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $pagename = 'Riwayat Setor Sampah';
        $allsampah = Sampah::all();
        if (Auth::user()->role=='admin') {
            $data = SetorSampah::all();
            return view('setor.index',compact('pagename','data','allsampah'));
        }else {
            $data = SetorSampah::where('warga_id', Auth::user()->id)->get();
            return view('setor.index',compact('pagename','data','allsampah'));
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
        $pagename = 'Input Data Setor Sampah';
        return view('setor.create', compact('pagename'));

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
            'request_id' => 'required|numeric',
            'jumlah_setor' => 'required|numeric',
            'method' => 'required',
            'kuantitas_sampah' => 'required'
        ]);

        $requestsetor = RequestSetor::find($request->get('request_id'));
        $requestsetor->status = 'Success';
    
        $data = SetorSampah::create([
            'warga_id' =>$requestsetor->warga_id,
            'request_id' => $request->get('request_id'),
            'jumlah_setor' => $request->get('jumlah_setor'),
            'kuantitas_sampah' => $request->get('kuantitas_sampah'),
            'method' => $request->get('method'),
        ]);
        if ($request->get('method') == "Top Up") {
            $warga = User::find($data->warga_id);
            $warga->saldo +=(double)$data->jumlah_setor;
            $warga->save();
        }
       
        $requestsetor->save();
        $data->save();  



        return redirect('home/setor')->with('success','Data Setor Sampah Ditambahkan');
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
        $pagename = 'Edit Setor Sampah';
        $data = SetorSampah::find($id);
    
        return view('setor.edit',compact('pagename','data'));
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




        return redirect('home/setor')->with('success','Data Setor Sampah Diperbaruhi');
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
        $data = SetorSampah::find($id);
        $data->delete();
        return redirect('home/setor')->with('success','Data Setor Sampah Dihapus');
    }
}
