<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WargaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = User::where('role', 'warga')->get();
        $pagename = 'Data Warga';

        return view('warga.index', compact('data', 'pagename'));
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
    }
    public function profile(){
        $data = Auth::user();
        return view('profile.index',compact('data'));
    }
    public function profileUpdate(Request $request){
        
        $data = User::find(Auth::user()->id);
        $data->email = $request->get('email');
        $data->alamat = $request->get('alamat');
        $data->tempat_lahir = $request->get('tempat_lahir');
        $data->tanggal_lahir = $request->get('tanggal_lahir');
        $data->nik = $request->get('nik');
        $data->no_hp = $request->get('no_hp');
        $data->no_rekening = $request->get('no_rekening');
        if ($request->hasFile('images')) {
            $request->file('images')->move('images/', $request->file('images')->getClientOriginalName());
            $data->foto_ktp = $request->file('images')->getClientOriginalName();
        }
        $data->save();

        return redirect('home/warga/profile')->with('success','Profil Berhasil di Perbarui');
    }
}
