@extends('layouts/mainLayout')

@section('content')
    <div class="container pt-5 mb-5">
        <div class="col-md-4 offset-md-4 mt-5 mb-5">
            <div class="card bg-light">
                <div class="header mx-auto">
                    <h3 class="fw-bold text-center pt-4 px-4">Tambah Truk</h3>
                </div>
                <form action="{{route('addTruk')}}" method="post">
                @csrf
                <div class="card-body">
                    <div class="form-group m-2">
                        <label for="device_name" class="form-label">Nama Truk</label>
                        <input type="text" name="device_name" class="form-control shadow @error('device_name') is-invalid @enderror" placeholder="Nama Truk">
                        @error('device_name')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                         @enderror
                    </div>
                    <div class="form-group m-2">
                        <label for="kapasitas_pengangkut_sampah" class="form-label">Kapasitas Truk</label>
                        <input type="text" name="kapasitas_pengangkut_sampah" class="form-control shadow @error('kapasitas_pengangkut_sampah') is-invalid @enderror" placeholder="Kapasitas Truk">
                        @error('kapasitas_pengangkut_sampah')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                         @enderror
                    </div>

                    <div class="mx-auto col-sm-4 mb-3 p-3">
                        <button type="submit" class="shadow fw-bold btn btn-primary btn-block w-99 ">Tambah</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection
