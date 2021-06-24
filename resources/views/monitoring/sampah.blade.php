@extends('layouts/monitoring')
@section('maps-content')
    <div class="p-3 border bg-light">
        <img src="assets/img/icon/maps.png" class="img-fluid mx-auto d-block" alt="..." width="65%">
    </div>
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
    </div>
@endsection
