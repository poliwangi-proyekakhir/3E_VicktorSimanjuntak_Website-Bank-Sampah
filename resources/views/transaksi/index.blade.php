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
                     
                        <strong class="card-title">{{$pagename}}</strong>
                    </div>
                    
                    <div class="card-body">
                    <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pelanggan</th>
                                    <th>Nama Produk</th>
                                    <th>Kuantitas Produk</th>
                                    <th>Gambar Produk</th>
                                    <th>Total</th>
                                    <th>Waktu Transaksi</th>
                                    <th>Aksi</th>
                                  
                                </tr>
                            </thead>
                            <tbody>
                                
                                @foreach($data as $i => $row)
                               
                                <tr>
                                    <td>{{++$i}}</td>
                                    <td>{{$row->warga->nama}}</td>
                                    <td>{{$row->produk->nama}}</td>
                                    <td>{{$row->kuantitas_produk}}</td>
                                    <td><img src="{{url('images/'.$row->produk->gambar)}}" alt="" width="50" height="50"></td>
                                    <td>@currency($row->total)</td>
                                    <td>{{date('d F Y',strtotime($row->created_at))}}</td>
                                   
                                    <td>
                                        
                                        <form class="form-inline" action="{{route('transaksi.destroy', $row ->id)}}" method="post" >
                                            @csrf
                                            @method('DELETE')
                                           
                                            <button class="btn btn-outline-danger ml-3"  type="submit"><i class="menu-icon fa fa-trash"></i></button> 
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