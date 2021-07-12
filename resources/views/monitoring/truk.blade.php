@extends('layouts/monitoring')
@section('maps-content')

    <div class="col-md-5 offset-md-0 mt-4">
        <h1 class="fw-bold pt-5 px-6">Monitoring Truk</h1>
    </div>
    <div class="p-3 border bg-light">
        <h1 class="align-middle text-center"> <br><br><br>COMING<br>SOON<br><br><br><br><br>

        </h1>
    </div>
@endsection

@section('table-content')
    <div class="col-md-5 offset-md-0 mt-4">
        <h1 class="fw-bold pt-5 px-6 text-white">Monitoring Truk</h1>
    </div>
    <div class="p-1 border bg-light">
        <table class="table table-responsive">
            <thead class="table-secondary">
            <tr>
                <th scope="col"></th>
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
        @if (Auth::check())
            <div class="d-grid gap-2 col-6 mx-auto  ">
                <a class="btn btn-primary" href="{{route('addTruk')}}">Tambah Truk</a>
            </div>
        @endif
    </div>
@endsection

@section('js')
    <!-- Here Maps lib -->
    <script src="https://js.api.here.com/v3/3.1/mapsjs-core.js" type="text/javascript" charset="utf-8"></script>
    <script src="https://js.api.here.com/v3/3.1/mapsjs-service.js" type="text/javascript" charset="utf-8"></script>
    <script src="https://js.api.here.com/v3/3.1/mapsjs-ui.js" type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript" src="https://js.api.here.com/v3/3.1/mapsjs-mapevents.js"></script>
    <link rel="stylesheet" type="text/css" href="https://js.api.here.com/v3/3.1/mapsjs-ui.css" />

    <script src="{{ asset('js/Maps/maps.js') }}"></script>
@endsection
