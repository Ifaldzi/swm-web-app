@extends('layouts/monitoring')
@section('maps-content')
    <div class="p-3 border bg-light" id="map-container" style="height: 500px"></div>
@endsection

@section('table-content')
    <div class="p-3 border bg-light">
        <table class="table">
            <thead class="table-secondary">
            <tr>
                <th scope="col">Truk</th>
                <th scope="col">Nomor Truk</th>
                <th scope="col">Area</th>
            </tr>
            </thead>
            <tbody>
                @for ($i=0;$i<3;$i++)
                    <tr class="align-middle">
                    <th scope="row"><img src="assets/img/icon/trukSampah.jpeg" alt=""class="img-thumbnail"></th>
                    <td >{{$i+1}}</td>
                    <td>Subang</td>
                    </tr>
                @endfor
            </tbody>
        </table>
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
