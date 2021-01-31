<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>

    @if (Auth::user()->name == 'admin')
        @can('create', App\Karyawan::class)
        Welcome Admin
        @endcan
    @else
        welcome you
    @endif
    
    
  </title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('backend/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('backend/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('backend/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset('backend/plugins/jqvmap/jqvmap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('backend/dist/css/adminlte.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('backend/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('backend/plugins/daterangepicker/daterangepicker.css') }}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('backend/plugins/summernote/summernote-bs4.min.css') }}">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
    @if (Auth::user()->name == 'admin')
        @can('create', App\Karyawan::class)
            <div class="wrapper">

        @include('includes.header')

        @include('includes.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard v1</li>
                    </ol>
                </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                <div class="col-12">
                    <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Responsive Hover Table</h3>

                        <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                            <div class="input-group-append">
                            <button type="submit" class="btn btn-default">
                                <i class="fas fa-search"></i>
                            </button>
                            </div>
                        </div>
                        </div>
                    </div>
                <!-- /.card-header -->
              <div class="container mt-3">
                <div class="row">
                    <div class="col-md-12">
                        <div class="py-4 d-flex justify-content-end align-items-center">
                            <h1 class="mr-auto">Table Bagian</h1>
                            @can('create', App\Bagian::class)
                                <a href="{{ url('/bagians/create') }}" class="btn btn-primary">
                                Tambah Bagian
                            @endcan
                            
                            </a>
                        </div>
                        @if (session()->has('pesan'))
                            <div class="alert alert-success" role="alert">
                                {{ session()->get('pesan') }}
                            </div>
                            
                        @endif
        
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Bagian</th>
                                        <th>Nama Supervisor</th>
                                        <th>Jumlah Bagian</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($bagians as $bagian)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                    @can('view', $bagian)
                                                    <a href="{{ url('/bagians/'.$bagian->id) }}">{{ $bagian->nama_bagian }}</a>                                           
                                                    @endcan
                                                    @cannot('view', $bagian)
                                                        {{ $bagian->nama_bagian }}
                                                    @endcannot
                                                
                                            </td>
                                            <td>{{ $bagian->nama_supervisor }}</td>
                                            <td>{{ $bagian->jumlah_bagian }}</td>
                                        </tr>
                                    @empty
                                        <td colspan="6" class="text-center">Data Kosong</td>
                                    @endforelse
                                </tbody>
                            </table>
        
                    </div>
                </div>
            </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
        @endcan
    @else
        @extends('layouts.app')
        @section('content')
            <!-- /.card-header -->
            <div class="container mt-3">
                <div class="row">
                    <div class="col-md-12">
                        <div class="py-4 d-flex justify-content-end align-items-center">
                            <h1 class="mr-auto">Table Bagian</h1>
                            @can('create', App\Bagian::class)
                                <a href="{{ url('/bagians/create') }}" class="btn btn-primary">
                                Tambah Bagian
                            @endcan
                            
                            </a>
                        </div>
                        @if (session()->has('pesan'))
                            <div class="alert alert-success" role="alert">
                                {{ session()->get('pesan') }}
                            </div>
                            
                        @endif
        
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Bagian</th>
                                        <th>Nama Supervisor</th>
                                        <th>Jumlah Bagian</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($bagians as $bagian)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                    @can('view', $bagian)
                                                    <a href="{{ url('/bagians/'.$bagian->id) }}">{{ $bagian->nama_bagian }}</a>                                           
                                                    @endcan
                                                    @cannot('view', $bagian)
                                                        {{ $bagian->nama_bagian }}
                                                    @endcannot
                                                
                                            </td>
                                            <td>{{ $bagian->nama_supervisor }}</td>
                                            <td>{{ $bagian->jumlah_bagian }}</td>
                                        </tr>
                                    @empty
                                        <td colspan="6" class="text-center">Data Kosong</td>
                                    @endforelse
                                </tbody>
                            </table>
        
                    </div>
                </div>
            </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->                
       @endsection
    @endif

              
  

  @can('create', App\Karyawan::class)
        @include('includes.footer')

  

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
    @endcan

  

<!-- jQuery -->
<script src="{{ asset('backend/plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('backend/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('backend/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('backend/plugins/chart.js/Chart.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('backend/plugins/sparklines/sparkline.js') }}"></script>
<!-- JQVMap -->
<script src="{{ asset('backend/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('backend/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('backend/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('backend/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('backend/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('backend/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset('backend/plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('backend/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('backend/dist/js/adminlte.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('backend/dist/js/demo.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('backend/dist/js/pages/dashboard.js') }}"></script>
</body>
</html>

