@extends('layouts/mainLayout')

@section('content')
    <div class="container pt-5">
        <div class="col-md-4 offset-md-4 mt-5 mb-5">
            <div class="card bg-light">
                <div class="header mx-auto">
                    <h3 class="fw-bold text-center pt-4 px-4">Tambah Tempat Sampah</h3>
                </div>
                <form action="{{route('addTempatSampah')}}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="form-group m-2">
                        <label for="id_truk" class="form-label">ID Truk</label><br>
                        <select name="id_truk" id="id_truk" class="form-select">
                            @foreach ($trucks as $truck)
                                <option value="{{ $truck->id }}" class="dropdown-item">{{ $truck->device_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group m-2">
                        <label for="nama_tempat_sampah" class="form-label">Nama Tempat Sampah</label>
                        <input type="text" name="nama_tempat_sampah" class="form-control shadow @error('nama_tempat_sampah') is-invalid @enderror" placeholder="Nama Tempat Sampah">
                        @error('nama_tempat_sampah')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group m-2">
                        <label for="volume_tempat_sampah" class="form-label">Volume Tempat Sampah</label>
                        <input type="text" name="volume_tempat_sampah" class="form-control shadow @error('volume_tempat_sampah') is-invalid @enderror" placeholder="Volume Tempat Sampah">
                        @error('volume_tempat_sampah')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group m-2">
                        <label for="tinggi_tempat_sampah" class="form-label">Tinggi Tempat Sampah</label>
                        <input type="text" name="tinggi_tempat_sampah" class="form-control shadow @error('tinggi_tempat_sampah') is-invalid @enderror" placeholder="Tinggi Tempat Sampah">
                        @error('tinggi_tempat_sampah')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group m-2">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" name="alamat" class="form-control shadow @error('alamat') is-invalid @enderror" placeholder="Alamat">
                        @error('alamat')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group m-2">
                        <label for="longitude" class="form-label">Longitude</label>
                        <input type="text" name="longitude" class="form-control shadow @error('longitude') is-invalid @enderror" placeholder="Longitude">
                        @error('longitude')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group m-2">
                        <label for="latitude" class="form-label">Latitude</label>
                        <input type="text" name="latitude" class="form-control shadow @error('latitude') is-invalid @enderror" placeholder="Latitude">
                        @error('latitude')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
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
