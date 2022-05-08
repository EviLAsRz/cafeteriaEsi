
@extends('layouts.app')

@section('links')
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
@endsection

@section('bodyID')
{{ 'home' }}@endsection

@section('navTheme')
{{ 'dark' }}@endsection

@section('logoFileName')
{{ URL::asset('/images/logo.png') }}@endsection


@section('content')
<section class="banner">
    
</section>

<section class="contact">
    <div class="container">
        <h2 class="title flex-center">Contáctanos</h2>
        <div class="flex-center contact-wrapper">
        <div class="form-wrapper flex-center">
            <form>
                <div class="mb-3">
                    <label for="name" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="name" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Correo de contacto</label>
                    <input type="email" class="form-control" id="email">
                </div>
                <div class="w-100 flex-center">
                <a href="mailto:cafeteriaesipw.sdp@gmail.com" class="primary-btn msg-btn w-100 px-3 py-2 text-center rounded">
                    Enviar mensaje
                </a>
                </div>
            </form>
        </div>

        <div class="gmap flex-center">
        <div class="mapouter"><div class="gmap_canvas"><iframe width="600" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=Avenida%20Universidad%20de%20C%C3%A1diz,%2010,%20Puerto%20Real&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://www.whatismyip-address.com/divi-discount/">divi discount</a><br><style>.mapouter{position:relative;text-align:right;height:500px;width:600px;}</style><a href="https://www.embedgooglemap.net">embedgooglemap.net</a><style>.gmap_canvas {overflow:hidden;background:none!important;height:500px;width:600px;}</style></div></div>
        </div>

        </div>
    </div>
</section>
@endsection