
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', "Zen's Dulce") }}</title>

    
    <meta name="csrf-token" content="{{ csrf_token() }}">

    
    <script>
        var assetBaseUrl = "{{ asset('') }}";
    </script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://use.fontawesome.com/a94b89670e.js"></script>

    
    <!-- <link rel="dns-prefetch" href="//fonts.gstatic.com"> -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap" rel="stylesheet">

    <!-- Estilos -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('links')
    
</head>
<body id="@yield('bodyID')">
    <header>
        <nav data-theme="@yield('navTheme')" class="home-nav @yield('navTheme')">
            <a href="/" class="logo-wrapper">
                <img class="logo" src="@yield('logoFileName')" alt="logo">
                <h3 class="logo-name">{{ config('app.name') }}</h3>
            </a>
            <ul class="nav-links">
                <li><a href="/">Inicio</a></li>
                <li><a href="{{ route('menu') }}">Menú</a></li>
                @guest
                    <li><a href="{{ route('register') }}">{{ __('Registrarse') }}</a></li>
                    <li><a href="{{ route('login') }}">Iniciar Sesión</a></li>
                @else
                    @if (auth()->user()->role == 'customer')
                    <li><a href="{{ route('cart') }}">Carrito</a></li>
                    <li><a href="{{ route('order') }}">Pedido</a></li>
                    @elseif (auth()->user()->role != 'customer')
                    <li><a href="{{ route('kitchenOrder') }}">Pedido</a></li>
                    @endif
                    <li>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">{{ __('Cerrar Sesión') }}</a>
                    </li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                @endguest
            </ul>
            <div class="burger">
                <div class="line1"></div>
                <div class="line2"></div>
                <div class="line3"></div>
            </div>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <div class="container footer-wrapper">
        <div class="row footer-content">
            <div class="col-sm-12 col-md-6 col-lg-4 open-hours">
                <div class="title-wrapper">
                    <h3>Hora de apertura</h3>
                </div>
                <div class="footer-detail">
                    <p>Lunes - Viernes</p>
                    <p>8:00 AM - 8:00 PM</p>
                </div>
                <div class="footer-detail">
                    <p><b>Sábados y Domingos: Cerrado</b></p>
                </div>
            </div>

            <div class="col-sm-12 col-md-6 col-lg-4 find-us">
            </div> 

            <div class="col-sm-12 col-lg-4 social">
                <div class="title-wrapper">
                    <h3>Redes Sociales</h3>
                </div>
                <div class="footer-detail">
                    <div class="media-link">
                        <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M35.4645 7.40562C34.212 7.96062 32.8665 8.33562 31.452 8.50512C32.9115 7.6318 34.0034 6.25731 34.524 4.63812C33.1528 5.4526 31.652 6.02591 30.087 6.33312C29.0346 5.20941 27.6406 4.4646 26.1215 4.21433C24.6024 3.96405 23.0432 4.2223 21.6859 4.94899C20.3286 5.67569 19.2492 6.83016 18.6152 8.23317C17.9813 9.63618 17.8283 11.2092 18.18 12.7081C15.4015 12.5686 12.6835 11.8464 10.2022 10.5885C7.72085 9.33051 5.53178 7.56486 3.77702 5.40612C3.17702 6.44112 2.83202 7.64112 2.83202 8.91912C2.83135 10.0696 3.11467 11.2025 3.65684 12.2172C4.199 13.2319 4.98326 14.0972 5.94002 14.7361C4.83043 14.7008 3.74533 14.401 2.77502 13.8616V13.9516C2.77491 15.5652 3.33307 17.1292 4.35479 18.3781C5.37652 19.627 6.79887 20.484 8.38052 20.8036C7.35119 21.0822 6.27202 21.1232 5.22452 20.9236C5.67076 22.312 6.54001 23.5262 7.71057 24.396C8.88113 25.2659 10.2944 25.7479 11.7525 25.7746C9.27727 27.7177 6.22035 28.7717 3.07352 28.7671C2.51609 28.7673 1.95913 28.7347 1.40552 28.6696C4.59973 30.7234 8.31803 31.8133 12.1155 31.8091C24.9705 31.8091 31.998 21.1621 31.998 11.9281C31.998 11.6281 31.9905 11.3251 31.977 11.0251C33.344 10.0366 34.5239 8.81246 35.4615 7.41012L35.4645 7.40562Z" fill="#F4695B"/>
                        </svg>
                        <p><a href='https://twitter.com/cafeteriaesi'>@cafeteriaEsi</a></p>
                    </div>
                </div>
            </div>
        </div>

        <hr>
        <div class="copyright">
            <p>Copyright © 2022 Todos los derechos reservados por Cafeteria Esi, Inc.</p>
        </div>

        </div>
    </footer>
</body>
</html>
