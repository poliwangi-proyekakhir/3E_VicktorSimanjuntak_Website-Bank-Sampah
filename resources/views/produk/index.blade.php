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
                    @elseif(session()->get('error'))
                    <div class="alert alert-danger">
                        {{session()-> get('error')}}
                    </div>
                    @endif
                    <div class="card-header">
                        @if(Auth::user()->role == 'admin')
                        <a href="{{route('produk.create')}}" class="btn btn-primary pull-right">Tambah</a>
                        @endif
                        <strong class="card-title">{{$pagename}}</strong>
                    </div>

                    <div class="card-body">
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Stok</th>
                                    <th>Gambar </th>
                                    <th>Harga</th>
                                    <th>Deskripsi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach($data as $i => $row)

                                <tr>
                                    <td>{{++$i}}</td>
                                    <td>{{$row->nama}}</td>
                                    <td>{{$row->stok}}</td>
                                    <td><img src="{{url('images/'.$row->gambar)}}" alt="" width="50" height="50"></td>
                                    <td>@currency($row->harga)</td>
                                    <td>{{$row->deskripsi}}</td>
                                    <td>
                                        @if(Auth::user()->role == 'admin')
                                        <form class="form-inline" action="{{route('produk.destroy', $row ->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{route('produk.edit', $row ->id)}}" class="btn btn-outline-success "><i class="menu-icon fa fa-pencil"></i></a>
                                            <button class="btn btn-outline-danger ml-3" type="submit"><i class="menu-icon fa fa-trash"></i></button>
                                        </form>
                                        @else
                                        <button type="button" class="btn btn-primary mb-4" data-toggle="modal" data-target="#exampleModal-{{$row->id}}" data-whatever="@mdo">Beli</button>
                                        @endif


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


@foreach($data as $i => $row)
<div class="modal fade" id="exampleModal-{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Pembelian Produk </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('transaksi.store')}}" enctype="multipart/form-data" method="POST">

                    @csrf
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label ">Nama Pelanggan</label>
                        <input type="text" name="nama_pelanggan" class="form-control " value="{{Auth::user()->nama}}" disabled>
                    </div>

                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label ">Nama Produk</label>
                        <input type="text" name="nama_produk" class="form-control " value="{{$row->nama}}" disabled>
                        <input type="text" name="produk_id" class="form-control " value="{{$row->id}}" hidden>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label ">Kuantitas</label>
                        <input  type="number" name="qty" class="form-control " value="1">
                    </div>
                  
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-submit  btn-success">Chekout</button>
                    </div>

                </form>


            </div>

        </div>
    </div>
</div>
@endforeach




@endsection