@extends('layouts/monitoring')
@section('maps-content')

    <div class="col-md-5 offset-md-0 mt-4">
        <h1 class="fw-bold pt-5 px-6">Monitoring Truk</h1>
    </div>
    <div class="p-3 border bg-light">
        <img src="assets/img/icon/maps.png" class="img-fluid mx-auto d-block" alt="..." width="65%">
    </div>
@endsection

@section('table-content')
    <div class="col-md-5 offset-md-0 mt-4">
        <h1 class="fw-bold pt-5 px-6 text-white">Monitoring</h1>
    </div>
    <div class="p-3 border bg-light">
        <table class="table">
            <thead class="table-secondary">
            <tr>
                <th scope="col">Truk</th>
                <th scope="col">Nomor Truk</th>
                <th scope="col">Nama Truk</th>
                <th scope="col">Area</th>
                <th scope="col">Kapasitas</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($trucks as $truck )

                    <tr class="align-middle text-center">
                        <th scope="row"><img src="assets/img/icon/trukSampah.jpeg" alt=""class="img-thumbnail"></th>
                        <td >{{$loop->iteration}}</td>
                        <td >{{$truck->device_name}}</td>
                        <td>Subang</td>
                        <td>{{$truck->kapasitas_pengangkut_sampah}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-grid gap-2 col-6 mx-auto  ">
            <a class="btn btn-primary" href="{{route('addTruk')}}">Tambah Truk</a>
        </div>
    </div>
@endsection
