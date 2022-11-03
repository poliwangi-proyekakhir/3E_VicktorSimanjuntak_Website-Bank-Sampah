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
                        @if(Auth::user()->role == 'admin')
                        <a href="{{route('setor.create')}}" class="btn btn-primary pull-right">Tambah</a>
                        @endif
                        <strong class="card-title">{{$pagename}}</strong>
                    </div>

                    <div class="card-body">
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Waktu Pengambilan</th>
                                    <th>Jenis Sampah </th>
                                    <th>Alamat</th>
                                    <th>Kuantitas Sampah</th>
                                    <th>Jumlah Setor</th>
                                    <th>Metode Pembayaran</th>
                                    <th>Status</th>
                                    @if(Auth::user()->role == 'admin')
                                    <th>Aksi</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>

                                @foreach($data as $i => $row)

                                <tr>
                                    <td>{{++$i}}</td>
                                    <td>{{$row->warga->nama}}</td>
                                    <td>{{$row->requestSetor->tanggal_pengambilan}}</td>
                                    <td><?php
                                            $jenissampah = [];
                                            foreach ($allsampah as $value) {
                                                foreach (explode(",", $row->requestSetor->sampah_id) as $key) {
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
                                    <td>{{$row->kuantitas_sampah}}</td>
                                    <td>@currency($row->jumlah_setor)</td>
                                    <td>
                                    <label class="badge badge-primary">{{$row->method}}</label>
                                    </td>
                                    <td>
                                     <label class="badge badge-success">{{$row->requestSetor->status}}</label>
                                    </td>
                                    @if(Auth::user()->role =='admin')
                                    <td>
                                        <form class="form-inline" action="{{route('setor.destroy', $row ->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <!-- <a href="{{route('setor.edit', $row->id)}}" class="btn btn-outline-success "><i class="menu-icon fa fa-pencil"></i></a> -->
                                            <button class="btn btn-outline-danger ml-3" type="submit"><i class="menu-icon fa fa-trash"></i></button>
                                        </form>
                                    </td>
                                    @endif

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