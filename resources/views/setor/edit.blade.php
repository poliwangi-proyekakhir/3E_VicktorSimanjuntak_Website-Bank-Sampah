@extends('admin.layout.master')

@section('content')

<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Dashboard</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="#">Dashboard</a></li>
                    <li><a href="#">Forms</a></li>
                    <li class="active">Basic</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content mt-3">
    <div class="animated fadeIn">


        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-header">
                        <strong>{{$pagename}}</strong>
                    </div>
                    <div class="card-body card-block">

                        @if($errors->any())
                        <div class="alert alert-danger">
                            <div class="list-group">
                                @foreach($errors->all() as $error)
                                <li class="list-group-item">
                                    {{$error}}
                                </li>
                                @endforeach
                            </div>
                        </div>

                        @endif
                        <form action="{{route('setor.update', $data->id)}}" method="post" enctype="multipart/form-data" class="form-horizontal" id="sampah-form">
                            @method('PATCH')
                            @csrf




                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Jenis Sampah</label></div>
                                <div class="col-12 col-md-9"><input type="text" id="text-input" name="jenis_sampah" value="{{$data->jenis_sampah}}"   class="form-control"></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nama Sampah</label></div>
                                <div class="col-12 col-md-9"><input type="text" id="text-input" name="nama" value="{{$data->nama}}"   class="form-control"></div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Harga</label></div>
                                <div class="col-12 col-md-9"><input type="text" id="text-input" name="harga" value="{{$data->harga}}"   class="form-control"></div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Satuan</label></div>
                                <div class="col-1 col-md-1"><input type="number" id="text-input" name="satuan" value="{{$data->satuan}}" placeholder="1" value="1" class="form-control"></div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Deskripsi</label></div>
                                <!-- <div class="col-12 col-md-9"><input type="text" id="text-input" name="deskripsi"   class="form-control"></div> -->
                                <textarea name="deskripsi" class="ml-3" id="" cols="100%" rows="5" form="sampah-form">{{$data->deskripsi}}</textarea>
                            </div>


                            <div class="row form-group">
                                <div class="col col-md-3"><label for="file-input" class=" form-control-label">File Gambar</label></div>
                                <div class="col-12 col-md-9">
                                    @empty($data->gambar)
                                    @else
                                    <img src="{{url('images/'.$data->gambar)}}" width="100" height="100" class="mb-3">
                                    @endempty
                                    <input type="file" id="file" name="images" class="form-control-file" value="{{ old('images') }}">
                                </div>

                                @error('images')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                            </div>


                            <button type="submit" class="btn btn-primary btn-sm mr-2">
                                <i class="fa fa-dot-circle-o"></i> Save
                            </button>
                            <button type="reset" class="btn btn-danger btn-sm">
                                <i class="fa fa-ban"></i> Reset
                            </button>
                        </form>

                    </div>

                </div>
            </div>

        </div>
    </div>



    @endsection