@extends('layouts/monitoring')
@section('maps-content')
    <div class="p-3 border bg-light" id="map-container" style="width: 100%; height: 500px;"></div>
@endsection

@section('table-content')
    <div class="p-3 border bg-light">
        <table class="table">
            <thead class="table-secondary">
                <tr>
                    <th scope="col">Tempat Sampah</th>
                    <th scope="col">Volume</th>
                    <th scope="col">Lokasi</th>
                </tr>
            </thead>
            <tbody>
                @for ($i=0;$i<3;$i++)
                <tr class="align-middle">
                    <th scope="row"><img src="assets/img/icon/tongSampah.jpeg" alt=""class="img-thumbnail"></th>
                    <td >65%</td>
                    <td>Subang</td>
                    <td><a href="#" class="btn btn-primary">Send</a></td>
                </tr>
                @endfor
            </tbody>
        </table>
        <div class="d-grid gap-2 col-6 mx-auto  ">
            <a class="btn btn-primary" href="{{route('addTempatSampah')}}">Tambah Tempat Sampah</a>
        </div>
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
