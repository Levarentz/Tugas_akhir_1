<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
</head>
<body>
    
    <div class="container bg-white">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">Data Karyawan</h1>
                <hr>
                <form action="{{ route('admin.store') }}" method="POST" enctype="multipart/form-data"> 
                   @csrf
                    <div class="form-group">
                        <label for="nik">Nik</label>
                        <input type="text" name="nik" id="nik" class="form-control @error('nik')is-invalid @enderror">
                        @error('nik')
                            <div class="alert alert-danger">{{ $message }}</div>  
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nama">nama Produk</label>
                        <input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror">
                        @error('nama')
                            <div class="alert alert-danger">{{ $message }}</div> 
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga produk</label>
                        <input type="text" name="harga" id="harga" class="form-control @error('harga') is-invalid @enderror">
                        @error('harga')
                            <div class="alert alert-danger">{{ $message }}</div> 
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="image">Gambar Produk</label>
                        <input type="file" name="image" id="image" class="form-control-file">
                        @error('image')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="bagian_id">Bagian :</label>
                        <select class="form-control" id="bagian_id" name="bagian_id">
                            @foreach ($bagians as $bagian)
                                <option value="{{ $bagian->id }}" {{ old('bagian_id') == "$bagian->nama_bagian" ? 'selected' : '' }}>
                                    {{$bagian->nama_bagian}}
                                </option>
                            @endforeach
                            
                            
                        </select>
                        @error('bagian')
                            <div class="alert alert-danger">{{ $message }}</div>  
                        @enderror
                    
                        <button type="submit" class="btn btn-primary mb-2">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
</html>