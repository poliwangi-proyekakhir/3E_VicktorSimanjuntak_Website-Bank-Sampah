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
                        <a href="{{route('sampah.create')}}" class="btn btn-primary pull-right">Tambah</a>
                        @endif
                        <strong class="card-title">{{$pagename}}</strong>
                    </div>
                   
                    <div class="card-body">
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Jenis Sampah</th>                                   
                                    <th>Nama</th>
                                    <th>Satuan</th>
                                    <th>Gambar </th>
                                    <th>Harga</th>
                                    <th>Deskripsi</th>
                                    @if(Auth::user()->role == 'admin')
                                    <th>Aksi</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>

                                @foreach($data as $i => $row)
                               
                                <tr>
                                    <td>{{++$i}}</td>
                                    <td>{{$row->jenis_sampah}}</td>
                                    <td>{{$row->nama}}</td>
                                    <td>{{$row->satuan}}</td>
                                    <td><img src="{{url('images/'.$row->gambar)}}" alt="" width="50" height="50"></td>
                                    <td>@currency($row->harga)</td>
                                    <td>{{$row->deskripsi}}</td>
                                    @if(Auth::user()->role == 'admin')
                                    <td>
                                        
                                        <form class="form-inline" action="{{route('sampah.destroy', $row ->id)}}" method="post" >
                                            @csrf
                                            @method('DELETE')
                                            
                                            <a href="{{route('sampah.edit', $row ->id)}}" class="btn btn-outline-success " ><i class="menu-icon fa fa-pencil"></i></a>
                                            <button class="btn btn-outline-danger ml-3"  type="submit"><i class="menu-icon fa fa-trash"></i></button> 
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