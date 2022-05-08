
@extends('layouts.backend')

@section('links')
    <link href="{{ asset('css/order.css') }}" rel="stylesheet">
@endsection

@section('bodyID')
{{ 'previousOrder' }}@endsection

@section('navTheme')
{{ 'light' }}@endsection

@section('logoFileName')
{{ URL::asset('/images/logo.png') }}@endsection


@section('content')
@if (!$discounts->count())
<!-- no pedidos previos -->
<section class="empty-order min-vh-100 flex-center pt-5">
    <div class="container d-flex flex-column justify-content-center align-items-center">
        <div class="hero-wrapper">
            <img src="{{ URL::asset('/images/empty_order.svg') }}" alt="">
        </div>
        <h3 class="mt-4 mb-2">Aún no hay cupones de descuento.</h3>
        <p class="text-muted">Aquí parece que no hay cupones de descuento por ahora...</p>
        <div class="d-flex mt-3">
            <a href="{{ route('createDiscount') }}" class="primary-btn mx-3">Crear descuento</a>
        </div>
    </div>
</section>
@else
<section class="min-vh-100 d-flex align-items-start mt-5 pt-18vh">
    <div class="container">
        <div class="d-flex justify-content-between">
        <h2 class="mb-4">Códigos de descuento</h2>
        <a href="{{ route('createDiscount') }}" class="primary-btn">+ Crear descuento</a>
        </div>
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Código</th>
                    <th scope="col">Porcentaje</th>
                    <th scope="col">Mínimo gasto</th>
                    <th scope="col">Límite</th>
                    <th scope="col">Fecha inicial</th>
                    <th scope="col">Fecha final</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($discounts as $discount)
                    <tr>
                        <th scope="row"><a href="{{ route('specificDiscount', $discount->id) }}">
                            {{ $discount->discountCode }} </a></th>
                        <td>{{ $discount->percentage }}%</td>
                        <td>€{{ number_format($discount->minSpend, 2) }}</td>
                        <td>€{{ number_format($discount->cap, 2) }}</td>
                        <td>{{ $discount->startDate }}</td>
                        <td>{{ $discount->endDate }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
    </div>
</section>
@endif
@endsection