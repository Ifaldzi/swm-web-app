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
