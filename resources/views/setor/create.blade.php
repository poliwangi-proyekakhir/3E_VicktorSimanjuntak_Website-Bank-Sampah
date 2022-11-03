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
                        <form action="{{route('setor.store')}}" method="post" enctype="multipart/form-data" class="form-horizontal" id="setor-form">
                            @csrf
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nomor Request Setor</label></div>
                                <div class="col-12 col-md-9"><input type="text" id="text-input" name="request_id"  class="form-control"></div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Jumlah Setor Rp.</label></div>
                                <div class="col-12 col-md-9"><input type="text" id="text-input" name="jumlah_setor" class="form-control"></div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Kuantitas Sampah </label></div>
                                <div class="col-1 col-md-1"><input type="number" id="text-input" name="kuantitas_sampah" placeholder="1" value="1" class="form-control"></div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Metode Pembayaran</label> </div>
                                <div class="col-12 col-md-9">
                                <select class="form-control" name="method" id="">
                                    <option value="" label="Pilih Metode Pembayaran"></option>
                                    <option value="Top Up">Top Up</option>
                                    <option value="cash">Cash / COD</option>
                                </select>
                             
                            </div>


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