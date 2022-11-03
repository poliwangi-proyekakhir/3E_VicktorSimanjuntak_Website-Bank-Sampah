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
                        <!-- <a href="{{route('produk.create')}}" class="btn btn-primary pull-right">Tambah</a> -->
                        <strong class="card-title">{{$pagename}}</strong>
                    </div>
                   
                    <div class="card-body">
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>No HP</th>
                                    <th>Tempat Tanggal / Lahir</th>
                                    <th>Alamat</th>
                                    <th>NIK</th>
                                    <th>Foto KTP</th>

                                    <th>No Rekening</th>
                                  
                                </tr>
                            </thead>
                            <tbody>
                                
                                @foreach($data as $i => $row)
                               
                                <tr>
                                    <td>{{++$i}}</td>
                                    <td>{{$row->nama}}</td>
                                    <td>{{$row->email}}</td>
                                    <td>{{$row->no_hp ?? '-'}}</td>
                                    <!-- <td><img src="{{url('images/'.$row->gambar)}}" alt="" width="50" height="50"></td> -->
                                    <td>{{$row->tempat_lahir ?? '-',$row->tanggal_lahir ?? '-'}}</td>
                                    <td>{{$row->alamat ?? '-'}}</td>
                                    <td>{{$row->nik ?? '-'}}</td>
                                    @empty($row->foto_ktp)
                                    <td>-</td>
                                    @else
                                    <td><img src="{{url('images/'.$row->foto_ktp)}}" alt="" width="50" height="50"></td>
                                    @endempty
                                    <td>{{$row->no_rekening ?? '-'}}</td>

                                    <!-- <td>
                                        
                                        <form class="form-inline" action="{{route('produk.destroy', $row ->id)}}" method="post" >
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{route('produk.edit', $row ->id)}}" class="btn btn-outline-success " ><i class="menu-icon fa fa-pencil"></i></a>
                                            <button class="btn btn-outline-danger ml-3"  type="submit"><i class="menu-icon fa fa-trash"></i></button> 
                                        </form>
                                    

                                    </td> -->
                                    
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