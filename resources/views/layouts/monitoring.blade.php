@extends('layouts/mainLayout')
@section('content')

    <div class="container-lg my-5">
        <div class="row g-2">
            {{-- =====================Map Content============================ --}}
            <div class="col-7 ">
                @yield('maps-content')
            </div>
            {{-- ========================End Map Content====================== --}}

            {{-- =========================Table Content======================= --}}
            <div class="col-5">
                @yield('table-content')
            </div>
            {{-- =========================End Table Content========================= --}}
        </div>
    </div>
@endsection
