@extends('admin.layout.master')

@section('content')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

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
                        <form action="{{route('request.update', $data->id)}}" method="post" enctype="multipart/form-data" class="form-horizontal" id="sampah-form">
                            @method('PATCH')
                            @csrf


                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Jenis Sampah</label></div>
                                <div class="col-12 col-md-9">
                                    <select id="sampah_id" name="sampah_id[]" class="mul-select form-control" multiple='multiple'>
                                        @foreach($allsampah as $s)
                                        <option value="{{$s ->id}}" @if(in_array($s->id,explode(',',$data->sampah_id)))
                                            selected
                                            @endif
                                            >{{$s -> jenis_sampah}}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Tanggal Pengambilan</label></div>
                                <div class="col-12 col-md-9"><input type="date" id="text-input" name="tanggal_pengambilan" value="{{$data->tanggal_pengambilan}}"   class="form-control"></div>
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


    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script>
        $(document).ready(function() {

            $("#sampah_id").select2({

                placeholder: "Silahkan Pilih"

            });

        });
    </script>

    @endsection