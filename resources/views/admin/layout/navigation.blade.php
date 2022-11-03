<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">

        <div class="navbar-header">
            <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand px-3 py-2" href="./"><img src="{{asset('images/logo.png')}}" width="80" height="100"  alt="Logo"></a>
            <!-- <a class="navbar-brand hidden" href="./"><img src="{{asset('images/logo.png')}}" alt="Logo"></a> -->
        </div>

        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="{{url('/home')}}"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                   
                   
                    @if(Auth::user()->role == 'admin')
                    <a href="{{url('/home/warga')}}"> <i class="menu-icon fa fa-user"></i>Warga</a>
                    @endif
                    <a href="{{url('/home/sampah')}}"> <i class="menu-icon fa fa-archive"></i>Sampah</a>
                    <a href="{{url('/home/produk')}}"> <i class="menu-icon fa fa-shopping-cart"></i>Produk</a>
                    <a href="{{url('/home/setor')}}"> <i class="menu-icon fa fa-bar-chart-o"></i>Setor Sampah</a>
                    <a href="{{url('/home/request')}}"> <i class="menu-icon fa fa-truck"></i>Request Setor Sampah</a>
                    <a href="{{url('/home/transaksi')}}"> <i class="menu-icon fa fa-credit-card"></i>Transaksi</a>
        
                   
                </li>
               
              

               
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside>