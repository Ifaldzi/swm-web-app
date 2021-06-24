@extends('layouts/mainLayout')

@section('content')
    <div class="container pt-5">
        <div class="col-md-4 offset-md-4 mt-5 mb-5">
            <div class="card bg-light">
                <div class="header mx-auto">
                    <h3 class="fw-bold text-center pt-4 px-4">Tambah Tempat Sampah</h3>
                </div>
                <form action="{{route('addTempatSampah')}}" method="post">
                @csrf
                <div class="card-body">
                    {{-- @if(session('errors'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            Something it's wrong:
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif --}}

                    {{-- @if (Session::has('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                        </div>
                    @endif --}}

                    {{-- Error Alert --}}
                    @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{session('error')}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div class="form-group m-2">
                        <div class="dropdown">
                            <label for="id_truk" class="form-label">ID Truk</label><br>
                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                            ID Truk
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="#">Truk 1</a>
                                <a class="dropdown-item" href="#">Truk 2</a>
                            </div>
                        </div>
                    </div>
                    <div class="form-group m-2">
                        <label for="nama_tempat_sampah" class="form-label">Nama Tempat Sampah</label>
                        <input type="text" name="nama_tempat_sampah" class="form-control shadow" placeholder="Nama Tempat Sampah">
                    </div>
                    <div class="form-group m-2">
                        <label for="volume_tempat_sampah" class="form-label">Volume Tempat Sampah</label>
                        <input type="text" name="volume_tempat_sampah" class="form-control shadow" placeholder="Volume Tempat Sampah">
                    </div>
                    <div class="form-group m-2">
                        <label for="tinggi_tempat_sampah" class="form-label">Tinggi Tempat Sampah</label>
                        <input type="text" name="tinggi_tempat_sampah" class="form-control shadow" placeholder="Tinggi Tempat Sampah">
                    </div>
                    <div class="form-group m-2">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" name="alamat" class="form-control shadow" placeholder="Alamat">
                    </div>
                    <div class="form-group m-2">
                        <label for="longitude" class="form-label">Longitude</label>
                        <input type="text" name="longitude" class="form-control shadow" placeholder="Longitude">
                    </div>
                    <div class="form-group m-2">
                        <label for="latitude" class="form-label">Latitude</label>
                        <input type="text" name="latitude" class="form-control shadow" placeholder="Latitude">
                    </div>
                    <div class="mx-auto col-sm-4 mb-3 p-3">
                        <button type="submit" class="shadow fw-bold btn btn-primary btn-block">Tambah</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection