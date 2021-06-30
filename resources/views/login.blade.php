@extends('layouts.app')

@section('content')
    <div class="container mt-5 pt-5">
        <div class="col-md-4 offset-md-4 mt-5">
            <div class="card bg-light">
                <div class="header mx-auto">
                    <div id="loginicon" >
                    <img  src="assets/img/icon.jpeg" alt="" width="35%">
                    </div>
                    <h3 class="fw-bold text-center pt-4 px-4">Login Administrator</h3>
                </div>
                <form action="{{route('login')}}" method="post">
                @csrf
                <div class="card-body">
                    <div class="form-group p-2 m-2">
                        <input type="text" name="username" value="{{ old('username') }}"class="form-control shadow @error('username') is-invalid @enderror" placeholder="Username">
                        @error('username')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group p-2 m-2">
                        <input type="password" name="password" class="form-control shadow @error('password') is-invalid @enderror" placeholder="Password">
                        @error('password')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="mx-auto p-4 w-75">
                        <button type="submit" class="shadow fw-bold btn btn-warning btn-block ">Login</button>
                    </div>
                    {{-- <p class="text-center">Belum punya akun? <a href="#">Register</a> sekarang!</p> --}}
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection
