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
    <div class="bg-image" style="background-image: url('./images/esi.jpg'); height: 100vh;">
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center min-vh-100">
                <div class="col-lg-6 col-10">
                    <div class="card">
                        <div class="card-header"><h3 class="text-center py-3">Inicio de sesión</h3></div>
    
                        <div class="card-body py-4">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
    
                                <div class="row mb-3">
                                    <label for="email" class="col-md-4 col-form-label text-md-center">{{ __('dirección de correo') }}</label>
    
                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
    
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
    
                                <div class="row mb-3">
                                    <label for="password" class="col-md-4 col-form-label text-md-center">{{ __('contraseña') }}</label>
    
                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
    
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
    
                                <div class="row mb-3">
                                    <div class="col-md-6 offset-md-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
    
                                            <label class="form-check-label" for="remember">
                                                {{ __('recuérdame') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>
    
                                <div class="row mb-0">
                                    <div class="col-md-8 offset-md-2 text-center ">
                                        <button type="submit" class="primary-btn w-20 my-2 py-2">
                                            {{ __('entrar') }}
                                        </button>
    
                                        @if (Route::has('password.request'))
                                        <div class='text-center'>
                                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                                {{ __('¿Olvidaste la contraseña?') }}
                                            </a>
                                        </div>
                                        @endif
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
