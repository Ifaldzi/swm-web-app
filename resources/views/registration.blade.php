@extends('layouts/mainLayout')

@section('content')
    <div class="container pt-5 pb-4">
        <div class="col-md-4 offset-md-4 mt-5">
            <div class="card bg-light">
                <div class="header mx-auto">
                    <h3 class="fw-bold text-center pt-4 px-4">Registrasi Petugas</h3>
                </div>
                <form action="{{route('registration')}}" method="post">
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
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" name="nama" class="form-control shadow" placeholder="Nama">
                    </div>
                    <div class="form-group m-2">
                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                        <input type="text" name="jenis_kelamin" class="form-control shadow" placeholder="Jenis Kelamin">
                    </div>
                    <div class="form-group m-2">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" name="alamat" class="form-control shadow" placeholder="Alamat">
                    </div>
                    <div class="form-group m-2">
                        <label for="no_telp" class="form-label">Nomor Telepon</label>
                        <input type="text" name="no_telp" class="form-control shadow" placeholder="Nomor Telepon">
                    </div>
                    <div class="form-group m-2">
                        <label for="username_petugas" class="form-label">Username</label>
                        <input type="text" name="username_petugas" class="form-control shadow" placeholder="Username">
                    </div>
                    <div class="form-group m-2">
                        <label for="password_petugas" class="form-label">Password</label>
                        <input type="password" name="password_petugas" class="form-control shadow" placeholder="Password">
                    </div>
                    <div class="mx-auto col-sm-4 mb-3 p-3">
                        <button type="submit" class="shadow fw-bold btn btn-warning btn-block w-60">Register Now</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection