@extends('layouts/monitoring')
@section('maps-content')

    <div class="col-md-5 offset-md-0 mt-4">
        <h1 class="fw-bold pt-5 px-6">Monitoring Tempat Sampah</h1>
    </div>
    <div class="p-3 border bg-light">
        <img src="assets/img/icon/maps.png" class="img-fluid mx-auto d-block" alt="..." width="65%">
    </div>
@endsection

@section('table-content')
    <div class="col-md-5 offset-md-0 mt-4">
        <h1  class="fw-bold pt-5 px-6 text-white">Monitoring Tempat</h1>
    </div>
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
                    @if (Auth::check())
                        <td><a href="#" class="btn btn-primary">Send</a></td>
                    @endif
                    </tr>
                @endfor
            </tbody>
        </table>
        @if (Auth::check())
            <div class="d-grid gap-2 col-6 mx-auto  ">
                <a class="btn btn-primary" href="{{route('addTempatSampah')}}">Tambah Tempat Sampah</a>
            </div>
        @endif
    </div>
@endsection
