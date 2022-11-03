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
                            <li class="active">Dashboard</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">

            

            @if(Auth::user()->role == 'admin')
            <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-flat-color-1">
                    <div class="card-body pb-0">
                        <div class="dropdown float-right">
                       
                       
                        </div>
                        <h4 class="mb-0">
                            <span class="count">{{$pelanggan}}</span>
                        </h4>
                        <p class="text-light">Jumlah Pelanggan</p>

                        <div class="chart-wrapper px-0" style="height:70px;" height="70">
                            <canvas id="widgetChart1"></canvas>
                        </div>

                    </div>

                </div>
            </div>
            @endif
            <!--/.col-->

            <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-flat-color-2">
                    <div class="card-body pb-0">
                        <div class="dropdown float-right">
                       
                       
                        </div>
                        <h4 class="mb-0">
                            <span class="count">{{$setor}}</span>
                        </h4>
                        <p class="text-light">Jumlah Setor Sampah</p>

                        <div class="chart-wrapper px-0" style="height:70px;" height="70">
                            <canvas id="widgetChart2"></canvas>
                        </div>

                    </div>
                </div>
            </div>
            <!--/.col-->

            <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-flat-color-4">
                    <div class="card-body pb-0">
                        <div class="dropdown float-right">
                
                         
                        </div>
                        <h4 class="mb-0">
                            <span class="count">{{$produk}}</span>
                        </h4>
                        <p class="text-light">Jumlah Produk Tersedia </p>

                        <div class="chart-wrapper px-0" style="height:70px;" height="70">
                            <canvas id="widgetChart3"></canvas>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-flat-color-3">
                    <div class="card-body pb-0">
                        <div class="dropdown float-right">
               
                           
                        </div>
                        <h4 class="mb-0">
                            <span class="count">{{$setor}}</span>
                        </h4>
                        <p class="text-light">Jumlah Setor Sampah</p>

                    </div>

                    <div class="chart-wrapper px-0" style="height:70px;" height="70">
                        <canvas id="widgetChart5"></canvas>
                    </div>
                </div>
            </div>
            <!--/.col-->

            <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-flat-color-4">
                    <div class="card-body pb-0">
                        <div class="dropdown float-right">
              
                            
                        </div>
                        <h4 class="mb-0">
                            <span class="count">{{$request}}</span>
                        </h4>
                        <p class="text-light">Jumlah Request Setor Sampah</p>

                        <div class="chart-wrapper px-3" style="height:70px;" height="70">
                            <canvas id="widgetChart4"></canvas>
                        </div>

                    </div>
                </div>
            </div>
            <!--/.col-->

           
            <!--/.col-->


           
            <!--/.col-->


            
            <!--/.col-->


            <!--/.col-->

            
            

            @if(Auth::user()->role=='warga')
            <div class="col-xl-3 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-one">
                            <div class="stat-icon dib"><i class="ti-money text-success border-success"></i></div>
                            <div class="stat-content dib">
                                <div class="stat-text">Saldo</div>  
                                <div class="stat-digit">@currency($saldo)</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            

        </div>
@endsection('content')