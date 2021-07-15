@extends('layouts/mainLayout')
@section('content')

<div class="container pt-5">
    <div class="col-md-5 offset-md-0 mt-4 ">
        <h1 class="fw-bold pt-4 px-4">Log Pengambilan Sampah</h1>
    </div>
        {{-- <div class="row align-items-center"> --}}
            <div class="my-5 ">
                <div class="row justify-content-md-center">
                    {{-- <div class="col-10"> --}}
                        <div class="p-3  bg-light ">
                            <table class="table table-responsive align-center mx-auto">
                                <thead class="table-secondary">
                                <tr align="center">
                                    <th scope="col">ID Tempat Sampah</th>
                                    <th scope="col">Waktu Pengambilan</th>
                                    <th scope="col">Waktu Penuh</th>
                                    <th scope="col">ID Truk</th>
                                    <th scope="col">Lokasi Tempat Sampah</th>
                                    @if (Auth::check())
                                        <th scope="col">Aksi</th>
                                    @endif
                                </tr>
                                </thead>
                                <tbody class="">
                                    @foreach ($logs as $log)
                                        <tr align="center">
                                            <td >{{$log->id_tempat_sampah}}</td>
                                            <td >{{$log->waktu_pengambilan}}</td>
                                            <td >{{$log->waktu_penuh}}</td>
                                            <td >{{$log->id_truk}}</td>
                                            <td >{{$log->alamat}}</td>

                                            @if (Auth::check())
                                                <td>

                                                    <form action="/LogSampah/{{$log->id}}" method="post">
                                                        @method('delete')
                                                        @csrf
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </form>
                                                </td>
                                            @endif
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-center">
                                {{ $logs->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
