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
                                    @for ($i=0;$i<7;$i++)
                                        <tr align="center">
                                            <td >xxxxx</td>
                                            <td >12:00</td>
                                            <td >11:10</td>
                                            <td >xxxxx</td>
                                            <td >Ciwaruga</td>
                                            @if (Auth::check())
                                                <th scope="row">
                                                <div class="list-group">
                                                        <input class="form-check-input me-1" type="checkbox" value="">
                                                </div>
                                                </th>
                                                <td><a href="#" class="btn btn-danger">Delete</a></td>
                                            @endif
                                        </tr>
                                    @endfor
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
