@extends('layouts/mainLayout')

@section('content')
    <div class="container pt-5">
        <div class="col-md-4 offset-md-4 mt-5 mb-5">
            <div class="card bg-light">
                <div class="header mx-auto">
                    <h3 class="fw-bold text-center pt-4 px-4">Tambah Truk</h3>
                </div>
                <form action="{{route('addTruk')}}" method="post">
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
                        <label for="nama_truk" class="form-label">Nama Truk</label>
                        <input type="text" name="nama_truk" class="form-control shadow" placeholder="Nama Truk">
                    </div>
                    <div class="form-group m-2">
                        <label for="kapasitas_pengangkut_sampah" class="form-label">Kapasitas Pengangkut Sampah</label>
                        <input type="text" name="kapasitas_pengangkut_sampah" class="form-control shadow" placeholder="Kapasitas Pengangkut Sampah">
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