@extends('layouts/mainLayout')
@section('content')
    <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="assets/img/slide/slide-3.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="assets/img/slide/slide-3.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="..." class="d-block w-100" alt="...">
            </div>
        </div>
     </div>

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
