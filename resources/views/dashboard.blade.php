@extends('layouts.backend')

@section('links')
    <script src="{{ asset('js/dashboard.js') }}" type="text/javascript"></script>
@endsection

@section('bodyID')
{{ 'Dashboard' }}@endsection

@section('navTheme')
{{ 'light' }}@endsection

@section('logoFileName')
{{ URL::asset('/images/logo.png') }}@endsection


@section('content')

<!-- todo - cosas de éxito de la sesión -->
<section class="container">
    <div class="row mt-5">
        <div class="col mt-lg-0 mt-5">
            <h1 class="mt-lg-0 mt-3">Panel</h1>
        </div>
        <div class="col-lg-5 col-12 d-flex justify-content-center mt-lg-0 mt-5">
            <div class="col-11 flex-center py-2 shadow rounded bg-white">
            <div class="flex-center">
            <img src="{{ URL::asset('/images/calendar.svg') }}" style="height: 32px; width: 32px;">
            </div>
            <p class="flex-center mt-lg-0 px-3">Desde: {{ $startDate }}</p>
            <p class="flex-center mt-lg-0 px-3">Hasta: {{ $today }} </p>
            </div>
        </div>
    </div>

    <div class="row mt-5 justify-content-center">
        <div class="col-lg-4 col-12 mb-lg-0 mb-3 flex-center">
            <div id="orders" class="col-11 p-3 h-100 shadow rounded bg-white"> 
                <h5 class="text-center">Total pedidos</h5>
                <h2 class="my-4 apexcharts-yaxis-title fw-bold text-center">{{ $totalOrders }}</h2>
                <p class="small text-muted text-center">Número de pedidos que se están realizando hasta ahora</p>
            </div>
        </div>
        <div class="col-lg-4 col-12 mb-lg-0 mb-3 flex-center">
            <div id="customers" class="col-11 p-3 h-100 shadow rounded bg-white">    
                <h5 class="text-center">Clientes totales</h5>
                <h2 class="my-4 apexcharts-yaxis-title fw-bold text-center">{{ $numCustomer }}</h2>
                <p class="small text-muted text-center">Base de clientes del sistema.</p>
            </div>
        </div>
    </div>
</section>


@endsection