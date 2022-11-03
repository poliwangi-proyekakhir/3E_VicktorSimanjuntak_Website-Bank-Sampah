<?php

namespace App\Http\Controllers;

use App\RequestSetor;
use App\Sampah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RequestSetorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pagename = 'Request Setor Sampah';
        $allsampah = Sampah::all();
        if (Auth::user()->role == 'admin') {
            $data = RequestSetor::orderBy('created_at','desc')->get();
            return view('request.index', compact('pagename', 'data','allsampah'));
        } else {
            $data = RequestSetor::where('warga_id', Auth::user()->id)->orderBy('created_at','desc')->get();
            return view('request.index', compact('pagename', 'data', 'allsampah'));
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
        $pagename = 'Request Setor Sampah';
        $sampah = Sampah::all();
        return view('request.create', compact('pagename', 'sampah'));
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

        $user = Auth::user();

        $data = RequestSetor::create([
            'warga_id' => $user->id,
            'sampah_id' => implode(",", $request->get('sampah_id')),
            'tanggal_pengambilan' => $request->get('tanggal_pengambilan'),
        ]);

        $data->save();
        return redirect('home/request')->with('success', 'Data Request Setor Ditambahkan');
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
        $data = RequestSetor::find($id);
        $allsampah = Sampah::all();
        $pagename = 'Edit Request Setor Sampah';
        return view('request.edit', compact('data', 'allsampah', 'pagename'));
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
        $data = RequestSetor::find($id);
        $data->sampah_id = implode(",", $request->get('sampah_id'));
        $data->tanggal_pengambilan = $request->get('tanggal_pengambilan');

        $data->save();
        return redirect('home/request')->with('success', 'Data Request Setor Diperbaruhi');
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
        $data = RequestSetor::find($id);
        $data->delete();
        return redirect('home/request')->with('success', 'Data Request Setor dihapus');
    }
}
