<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
</head>
<body>
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-12">
               <div class="pt-3 d-flex justify-content-end align-items-center" >
                   <h1 class="h1 mr-auto">Biodata {{ $karyawan->nama }}</h1>
                   <a href="{{ route('karyawans.edit', $karyawan->id) }}" class="btn btn-primary">Edit Data</a>
                   <br>
                    <form action="{{ route('karyawans.destroy', $karyawan->id) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
               </div>
               <hr>
               @if (session('pesan'))
                    <div class="alert alert-success" role="alert">
                    {{ session('pesan') }}
                    </div>
                @endif
               <ul>
                   <li>Nik : {{ $karyawan->nik }}</li>
                   <li>Nama : {{ $karyawan->nama }}</li>
                   <li>Harga : {{ $karyawan->harga }}</li>
                   <li>Gambar :
                       <img src="{{ Storage::url($karyawan->image) }}" alt="gambar" class="card-img" style="width:150px;">
                   </li>
                   <li>Bagian : {{ $karyawan->bagian->nama_bagian }}</li>
                  
                   <a href="{{ route('karyawans.index') }}" class="btn btn-info">Kembali</a>
               </ul>
            </div>
        </div>
    </div>
</body>
</html>