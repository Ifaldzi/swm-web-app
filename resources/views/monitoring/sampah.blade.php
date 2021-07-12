@extends('layouts/monitoring')
@section('maps-content')

    <div class="col-md-5 offset-md-0 mt-4">
        <h1 class="fw-bold pt-5 px-6">Monitoring Tempat Sampah</h1>
    </div>
    <div class="p-3 border bg-light" id="map-container" style="width: 100%; height: 500px;"></div>

@endsection

@section('table-content')
    <div class="col-md-5 offset-md-0 mt-4">
        <h1  class="fw-bold pt-5 px-6 text-white">Monitoring Tempat Sampah</h1>
    </div>
    <div class="p-3 border bg-light">
        <table class="table table-responsive">
            <thead class="table-secondary">
            <tr>
                <th scope="col"></th>
                <th scope="col">Nama</th>
                <th scope="col">Volume</th>
                <th scope="col">Lokasi</th>
                @if (Auth::check())
                    <th scope="col">Aksi</th>
                @endif
            </tr>
            </thead>
            <tbody>
                @foreach ($bins as $bin)
                <tr class="align-middle">
                    <th scope="row"><img src="assets/img/icon/tongSampah.jpeg" alt=""class="img-thumbnail" onclick="goToLocation({{ json_encode($bin->lokasi) }})"></th>
                    <td>{{$bin->device_name}}</td>
                    <td >
                        @php
                            $response = $bin->calculateVolume();
                        @endphp
                        @if ($response['code'] != "404")
                            {{ $response['volume'] }} %
                        @else
                            {{ $response['status'] }}
                        @endif
                    </td>
                    <td>{{ $bin->lokasi->alamat }}</td>
                    @auth
                    @if ($response['volume']>=90)
                        <td>
                        <button class="btn btn-primary position-relative">Send
                        <span class="position-absolute top-0 start-100 translate-middle p-2 bg-danger border border-light rounded-circle">
                            <span class="visually-hidden">New alerts</span>
                        </button>
                        </td>
                    @elseif ($response['volume']>=50 && $response['volume']<=90)
                        <td><button class="btn btn-primary position-relative ">Send
                        </button>
                        </td>


                    @else
                        <td><button class="btn btn-primary position-relative disabled">Send
                        </button>
                        </td>

                    @endif
                    @endauth
                </tr>
                @endforeach
            </tbody>
        </table>
        @if (Auth::check())
            <div class="d-grid gap-2 col-6 mx-auto  ">
                <a class="btn btn-primary" href="{{route('addTempatSampah')}}">Tambah Tempat Sampah</a>
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

    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

    <script src="{{ asset('js/Maps/bin_maps.js') }}"></script>
@endsection
