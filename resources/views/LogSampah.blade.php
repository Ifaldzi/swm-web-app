@extends('layouts/mainLayout')
@section('content')

<div class="container pt-5">
    <div class="col-md-5 offset-md-0 mt-4">
        <h1 class="fw-bold pt-4 px-4">Log Pengambilan Sampah</h1>
    </div>
        {{-- <div class="row align-items-center"> --}}
            <div class="container-lg my-5">
                <div class="row justify-content-md-center">
                    {{-- <div class="col-10"> --}}
                        <div class="p-3 border bg-light">
                            <table class="table responsive">
                                <thead class="table-secondary responsive">
                                <tr align="center">
                                    <th scope="col">ID Tempat Sampah</th>
                                    <th scope="col">Waktu Pengambilan</th>
                                    <th scope="col">Waktu Penuh</th>
                                    <th scope="col">ID Truk</th>
                                    <th scope="col">Lokasi Tempat Sampah</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($logs as $log)
                                        <tr align="center">
                                            <td >{{$log->id_tempat_sampah}}</td>
                                            <td >{{$log->waktu_pengambilan}}</td>
                                            <td >{{$log->waktu_penuh}}</td>
                                            <td >{{$log->id_truk}}</td>
                                            <td >{{$log->alamat}}</td>
                                            @if (Auth::check())
                                                <th scope="row">
                                                <div class="list-group">
                                                        <input class="form-check-input me-1" type="checkbox" value="">
                                                </div>
                                                </th>
                                                <td><a href="#" class="btn btn-danger">Delete</a></td>
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
