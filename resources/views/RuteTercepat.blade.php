
@extends('layouts/mainLayout')
@section('content')

<div class="container pt-5">
    <div class="col-md-5 offset-md-0 mt-4">
        <h1 class="fw-bold pt-4 px-4">Rute Tercepat</h1>
    </div>
        {{-- <div class="row align-items-center"> --}}
        <div class="container-lg my-5 ">
            <div class="row g-6">
            <div class="col-7 ">
                <!-- Maps -->
                <div class="p-3 border bg-light" id="map-container" style="height: 500px">
                    {{-- <img src="assets/img/icon/maps.png" class="img-fluid mx-auto d-block" alt="..." width="65%"> --}}
                </div>
                </div>

            <!-- membuat card -->
            <div class="col-5">
                <div class="card text-white bg-success mb-3 mr-5" style="max-width: 18rem;">
                    <div class="card-header">5 min (1.5 km)</div>
                        <div class="card-body">
                            <h5 class="card-title">Rute tercepat dengan lalu lintas biasa</h5>
                        </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>

@section('js')
    <!-- Here Maps lib -->
    <script src="https://js.api.here.com/v3/3.1/mapsjs-core.js" type="text/javascript" charset="utf-8"></script>
    <script src="https://js.api.here.com/v3/3.1/mapsjs-service.js" type="text/javascript" charset="utf-8"></script>
    <script src="https://js.api.here.com/v3/3.1/mapsjs-ui.js" type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript" src="https://js.api.here.com/v3/3.1/mapsjs-mapevents.js"></script>
    <link rel="stylesheet" type="text/css" href="https://js.api.here.com/v3/3.1/mapsjs-ui.css" />

    <script src="{{ asset('js/Maps/maps.js') }}"></script>
@endsection
