@extends('layouts.app')

@section('content')
    <div class="container pt-5">
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
                    <div class="form-group p-2 m-2">
                        <input type="text" name="username" class="form-control shadow" placeholder="Username">
                    </div>
                    <div class="form-group p-2 m-2">
                        <input type="password" name="password" class="form-control shadow" placeholder="Password">
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
