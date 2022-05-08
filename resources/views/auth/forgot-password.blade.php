@extends('layouts.app')

@section('links')
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
@endsection

@section('bodyID')
{{ 'register' }}@endsection

@section('navTheme')
{{ 'dark' }}@endsection

@section('logoFileName')
{{ '../images/logo.png' }}@endsection


@section('content')
<section class="min-vh-100">
    <div class="bg-image" style="background-image: url('./images/forgot-password.jpg'); height: 100vh;">
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center min-vh-100">
                <div class="col-lg-6 col-10">
                    <div class="card">
                        <div class="card-header"><h3 class="text-center py-3">Forgot Password</h3></div>
    
                        <div class="card-body">
                            <div class="col-md-10 offset-md-1 mb-4 text-sm text-gray-600">
                                {{ __('¿Te has olvidado de tu contraseña? No te preocupes. Solo déjanos saber tu correo y te enviaremos un mensaje para cambiar tu contraseña por una nueva.') }}
                            </div>
                            <form method="POST" action="{{ route('password.email') }}">
                                @csrf
    
                                <div class="row my-4">
                                    <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Dirección de correo') }}</label>
    
                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
    
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
    
                                <div class="row mb-2">
                                    <div class="col-md-8 offset-md-2">
                                        <button type="submit" class="primary-btn w-100">
                                            {{ __('Cambiar contraseña') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection