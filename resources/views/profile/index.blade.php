@extends('admin.layout.master')

@section('content')

<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Profile</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="home/dashboard">Dashboard</a></li>
                    <li><a href="#">Table</a></li>
                    <li class="active">Data table</li>
                </ol>
            </div>
        </div>
    </div>
</div>




<div class="content mt-3">
    <div class="animated fadeIn">

        <div class="row ">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                    @if(session()->get('success'))
                    <div class="alert alert-success">
                        {{session()-> get('success')}}
                    </div>
                    @endif
                        <div class="col-lg-12 col-md-12">
                            <aside class="profile-nav alt">
                                <section class="card">
                                    <div class="card-header user-header alt bg-dark">
                                        <div class="media">
                                            <a href="#">
                                                <img class="align-self-center rounded-circle mr-3" style="width:85px; height:85px;" alt="" src="{{asset('images/avatar/1.png')}}">
                                            </a>
                                            <div class="media-body">
                                                <h2 class="text-light display-6">{{Auth::user()->nama}}</h2>
                                                <p>Pelanggan</p>
                                            </div>
                                        </div>
                                    </div>

                                    <form action='{{route("profile-update")}}' enctype="multipart/form-data" method="POST">
                                   
                                        @csrf
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">
                                                <a href="#"> <i class="fa fa-envelope-o"></i> Email</a>
                                                <input type="text" id="text-input" name="email" value="{{$data->email}}" class="form-control">
                                            </li>
                                            <li class="list-group-item">
                                                <a href="#"> <i class="fa fa-map"></i> Alamat</a>
                                                <input type="text" id="text-input" name="alamat" value="{{$data->alamat}}"  class="form-control">
                                            </li>
                                            <li class="list-group-item">
                                                <a href="#"> <i class="fa fa-calendar-o"></i> Tempat Lahir</a>
                                                <input type="text" id="text-input" name="tempat_lahir" value="{{$data->tempat_lahir}}"  class="form-control">
                                            </li>
                                            <li class="list-group-item">
                                                <a href="#"> <i class="fa fa-calendar-o"></i> Tanggal Lahir</a>
                                                <input type="date" id="text-input" name="tanggal_lahir" value="{{$data->tanggal_lahir}}"  class="form-control">
                                            </li>
                                            <li class="list-group-item">
                                                <a href="#"> <i class="fa fa-list-alt"></i> NIK</a>
                                                <input type="text" id="text-input" name="nik" value="{{$data->nik}}"  class="form-control">
                                            </li>
                                            </li>
                                            <li class="list-group-item">
                                                <a href="#"> <i class="fa fa-picture-o"></i> Foto KTP</a>
                                                @empty($data->foto_ktp)
                                                <input type="file" id="text-input" name="images" class="form-control"> 
                                                @else
                                                <input type="file" id="text-input" name="images" class="form-control mb-4" > 
                                                <img src="{{url('images/'.$data->foto_ktp)}}" alt="" width="150" height="100">
                                                @endempty
                                            </li>
                                            <li class="list-group-item">
                                                <a href="#"> <i class="fa fa-phone"></i> No HP</a>
                                                <input type="text" id="text-input" name="no_hp" value="{{$data->no_hp}}"  class="form-control">
                                            </li>
                                            <li class="list-group-item">
                                                <a href="#"> <i class="fa fa-credit-card"></i> No Rekening</a>
                                                <input type="text" id="text-input" name="no_rekening" value="{{$data->no_rekening}}"  class="form-control">
                                            </li>
                                        </ul>

                                        <button type="submit" class="btn btn-primary btn-sm mr-2 ml-2 mt-3  mb-3 px-3">
                                            <i class="fa fa-dot-circle-o"></i> Simpan
                                        </button>
                                        
                                    </form>
                                </section>
                            </aside>
                        </div>

                    </div>
                </div>
            </div>


        </div>

    </div>



    @endsection