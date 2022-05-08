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
<section class="min-vh-100 flex-center py-5">
    <div class="container">
        <h2 class="d-flex justify-content-center mt-5 mb-3">Crear descuento</h2>
        <form action="{{ route('createDiscount') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="discountCode" class="form-label">Código de descuento</label>
            <input type="text" class="form-control @error('discountCode') is-invalid @enderror" 
                id="discountCode" name="discountCode" value="{{ old('discountCode') }}">
            <div id="emailHelp" class="form-text">Consejo: el código de descuento debe ser único y tener un nombre significativo.</div>
            @error('discountCode')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="percentage" class="form-label">Procentaje de descuento (%)</label>
            <input type="number" class="form-control @error('percentage') is-invalid @enderror" 
                id="percentage" name="percentage" min="1" max="100" value="{{ old('percentage') }}">
            @error('percentage')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="minSpend" class="form-label">Gasto mínimo (€)</label>
            <input type="number" class="form-control @error('minSpend') is-invalid @enderror" id="minSpend" 
                name="minSpend" step=".01" value="{{ old('minSpend') }}">
            @error('minSpend')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="cap" class="form-label">Límite (€)</label>
            <input type="number" class="form-control @error('cap') is-invalid @enderror" 
                id="cap" name="cap" min="0" max="999" step=".01" value="{{ old('cap') }}">
            @error('cap')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="startDate" class="form-label pe-5">Fecha inicial</label>
            <input type="date" class="form-control @error('cap') is-invalid @enderror" 
                name="startDate" value="{{ old('startDate') }}">
            @error('startDate')
                <span class="invalid-feedback" style="display:block" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="endDate" class="form-label pe-5">Fecha final</label>
            <input type="date" class="form-control @error('cap') is-invalid @enderror" 
                name="endDate" value="{{ old('endDate') }}">
            @error('endDate')
                <span class="invalid-feedback" style="display:block" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Descripción</label>
            <textarea class="form-control @error('description') is-invalid @enderror" name="description" 
                style="height: 100px" value="{{ old('description') }}"></textarea>
            @error('description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <button type="submit" class="primary-btn">Crear</button>
        </form>
    </div>
</section>
@endsection