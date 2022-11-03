@extends('admin.layout.master')

@section('content')

<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

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
                    <li><a href="#">Table</a></li>
                    <li class="active">Data table</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    @if(session()->get('success'))
                    <div class="alert alert-success">
                        {{session()-> get('success')}}
                    </div>
                    @endif
                    <div class="card-header">
                        @if(Auth::user()->role == 'warga')
                        <a href="{{route('request.create')}}" class="btn btn-primary pull-right">Tambah</a>
                        @endif
                        <strong class="card-title">{{$pagename}}</strong>
                    </div>

                    <div class="card-body">
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Request</th>
                                    <th>Nama</th>
                                    <th>Waktu Pengambilan</th>
                                    <th>Jenis Sampah </th>
                                    <th>Alamat</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach($data as $i => $row)

                                <tr>
                                    <td>{{++$i}}</td>
                                    <td>{{$row->id}}</td>
                                    <td>{{$row->warga->nama}}</td>
                                    <td>{{$row->tanggal_pengambilan}}</td>
                                    <td>
                                        <?php
                                            $jenissampah = [];
                                            foreach ($allsampah as $value) {
                                                foreach (explode(",", $row->sampah_id) as $key) {
                                                    if ($value->id == $key) {
                                                        array_push($jenissampah, $value->jenis_sampah);
                                                    }
                                                }
                                            }
                                            $stringarray = implode(', ', $jenissampah);
                                            
                                        ?>
                                       {{ $stringarray}}
                                    </td>
                                    <td>{{$row->warga->alamat}}</td>
                                    <td>
                                        @if($row->status !='pending')
                                        <label class="badge badge-success">Success</label>
                                        @else
                                        <label class="badge badge-warning">Pending</label>
                                        @endif
                                    </td>

                                    <td>

                                        <form class="form-inline" action="{{route('request.destroy', $row ->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{route('request.edit', $row ->id)}}" class="btn btn-outline-success "><i class="menu-icon fa fa-pencil"></i></a>
                                            <button class="btn btn-outline-danger ml-3" type="submit"><i class="menu-icon fa fa-trash"></i></button>
                                        </form>


                                    </td>

                                </tr>

                                @endforeach
                                <!-- <tr>
                                    <td>Garrett Winters</td>
                                    <td>Accountant</td>
                                    <td>Tokyo</td>
                                    <td>$170,750</td>
                                </tr> -->

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


        </div>
    </div><!-- .animated -->
</div><!-- .content -->



@endsection