
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
                    <div class="form-group m-2">
                        <label for="id_truk" class="form-label">Truk</label>
                        <select class="form-select shadow @error('id_truk') is-invalid @enderror" name="id_truk" id="id_truk">
                            <option value="" selected disabled hidden>Pilih Truk</option>
                            @foreach ($trucks as $truck)
                                <option value="{{$truck->id}}">{{$truck->device_name}}</option>
                            @endforeach
                        </select>
                        @error('id_truk')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group m-2">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" name="nama" class="form-control shadow @error('nama') is-invalid @enderror" placeholder="Nama">
                        @error('nama')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group m-2 ">
                        <label for="jenis_kelamin" class="form-label ">Jenis Kelamin</label>
                        <div class="d-flex justify-content-center @error('jenis_kelamin') is-invalid @enderror">
                            <div class= "form-check ">
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="radio" name="jenis_kelamin" id="wanita" value="Wanita">
                                  <label class="form-check-label" for="wanita">Wanita</label>
                                </div>
                                <div class="form-check form-check-inline ">
                                  <input class="form-check-input" type="radio" name="jenis_kelamin" id="pria" value="Pria">
                                  <label class="form-check-label" for="pria">Pria</label>
                                </div>
                            </div>
                        </div>
                        @error('jenis_kelamin')
                            <div class="invalid-feedback my-auto">
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
                        <label for="no_telp" class="form-label">Nomor Telepon</label>
                        <input type="text" name="no_telp" class="form-control shadow @error('no_telp') is-invalid @enderror" placeholder="Nomor Telepon">
                        @error('no_telp')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group m-2">
                        <label for="username_petugas" class="form-label">Username</label>
                        <input type="text" name="username_petugas" class="form-control shadow @error('username_petugas') is-invalid @enderror" placeholder="Username">
                        @error('username_petugas')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group m-2">
                        <label for="password_petugas" class="form-label">Password</label>
                        <input type="password" name="password_petugas" class="form-control shadow @error('password_petugas') is-invalid @enderror" placeholder="Password">
                        @error('password_petugas')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="mt-5 mb-2">
                        <button type="submit" class="shadow fw-bold btn btn-warning btn-block w-100">Register Now</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection
