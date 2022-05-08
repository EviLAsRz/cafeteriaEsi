<!-- 
    Programmer Name: Mr. Lai Pin Cheng, Developer
    Description: Page where admin may view and update menu while customer can view menu and add menu to cart
    Edited on: 14 April 2022
 -->

@extends(( !Auth::check() || auth()->user()->role == 'customer' ) ? 'layouts.app' : 'layouts.backend' )

@section('links')
<link href="{{ asset('css/menu.css') }}" rel="stylesheet">
@endsection

@section('bodyID')
{{ 'menu' }}@endsection

@section('navTheme')
{{ 'light' }}@endsection

@section('logoFileName')
{{ URL::asset('/images/logo.png') }}@endsection


@section('content')
<section class="menu" style="margin-top: 17vh;">
    <div class="container">
        <a href={{"./filter?menuType="}} class="menu-title">
            <h2 class="d-flex justify-content-center menu-title">MENU</h2>
        </a>
        @if (session('success'))
        <div class="alert alert-success fixed-bottom" role="alert" style="width:500px;left:30px;bottom:20px">
            {{ session('success') }}
        </div>
        @endif

        <div class="row menu-bar">
        @if (Auth::check() && auth()->user()->role == 'admin')
            <div class="col-md-1 d-flex align-items-center">
                <div class="dropstart">    
                    <button type="button" class="btn btn-success" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside" id="filter-button">
                        <i class="fa fa-plus" aria-hidden="true"></i></i>
                    </button>
                    <div class="dropdown-menu">    
                        <form method='post' action="{{ route('saveMenuItem') }}" enctype="multipart/form-data" class="px-4 py-3" style="min-width: 350px">
                            @csrf
                            <div class="mb-2">
                                <label for="formFile" class="form-label">Item Image</label>
                                <input name="menuImage" class="form-control" type="file" id="item-image" required>
                            </div>
                            
                            <div class="dropdown-divider"></div>

                            <div class="mb-2">
                                <label for="ItemType" class="form-label">Item Type</label>
                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="itemTypeInputGroup">Type:</label>
                                    <select name="menuType" class="form-select" id="itemTypeInputGroup" >
                                        <option name="menuType" value="Bocadillo">Bocadillo</option>
                                        <option name="menuType" value="Dulce">Dulce</option>
                                        <option name="menuType" value="Pan">Pan</option>
                                        <option name="menuType" value="Extra">Extra</option>
                                        <option name="menuType" value="Aperitivo">Aperitivo</option>
                                        <option name="menuType" value="Plato_primero">Primer plato</option>
                                        <option name="menuType" value="Plato_segundo">Segundo plato</option>
                                        <option name="menuType" value="Bebidas">Bebidas</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="dropdown-divider"></div>

                            <div class="mb-1">
                                <label for="ItemName" class="form-label">Item Name</label>
                                <div class="input-group mb-3">
                                    <input name="menuName" type="text" class="form-control" placeholder="Name" aria-label="Item Name" required>
                                </div>
                            </div>

                            <div class="dropdown-divider"></div>

                            <div class="mb-1">
                                <label for="ItemPrice" class="form-label">Item Price</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">RM</span>
                                    <input name="menuPrice" type="number" min=0 step=0.01 class="form-control price-class" placeholder="Price" aria-label="Item Price" required>
                                    <span class="validity"></span>
                                </div>
                            </div>                            

                            <div class="dropdown-divider"></div>

                            <div class="mb-1">
                                <label for="ItemDescription" class="form-label">Item Description</label>
                                <div class="input-group mb-3">
                                    <textarea name="menuDescription" class="form-control" placeholder="Description" aria-label="Item Description" required></textarea>
                                </div>
                            </div>

                            <div class="dropdown-divider"></div>                                                    
                   
                            <div class="dropdown-divider"></div>

                            <button type="submit" class="btn btn-outline-success">Add Item</button>
                        </form>
                    </div>
                </div>
            </div>
        @endif
        @if (Auth::check() && auth()->user()->role == 'admin')
            <div class="col-md-8 offset-md-1 col-12 text-center menu-type my-3">
                <form method="get" action="{{ route('filterMenu') }}">
                    <button type="submit" name="menuType" value="" class="btn btn-light menu-type-button">All</button>
                    <button type="submit" name="menuType" value="Bocadillo" class="btn btn-light menu-type-button">Bocadillo</button>
                    <button type="submit" name="menuType" value="Dulce" class="btn btn-light menu-type-button">Dulce</button>
                    <button type="submit" name="menuType" value="Pan" class="btn btn-light menu-type-button">Pan</button>
                    <button type="submit" name="menuType" value="Extra" class="btn btn-light menu-type-button">Extra</button>
                    <button type="submit" name="menuType" value="Aperitivo" class="btn btn-light menu-type-button">Aperitivo</button>
                    <button type="submit" name="menuType" value="Plato_primero" class="btn btn-light menu-type-button">Primer plato</button>
                    <button type="submit" name="menuType" value="Plato_segundo" class="btn btn-light menu-type-button">Segundo plato</button>
                    <button type="submit" name="menuType" value="Bebidas" class="btn btn-light menu-type-button">Bebidas</button>
                </form>
            </div>
        @else
            <div class="col-md-8 offset-md-2 col-12 text-center menu-type my-3">
                <form method="get" action="{{ route('filterMenu') }}">
                    <button type="submit" name="menuType" value="" class="btn btn-light menu-type-button">All</button>
                    <button type="submit" name="menuType" value="Bocadillo" class="btn btn-light menu-type-button">Bocadillo</button>
                    <button type="submit" name="menuType" value="Dulce" class="btn btn-light menu-type-button">Dulce</button>
                    <button type="submit" name="menuType" value="Pan" class="btn btn-light menu-type-button">Pan</button>
                    <button type="submit" name="menuType" value="Extra" class="btn btn-light menu-type-button">Extra</button>
                    <button type="submit" name="menuType" value="Aperitivo" class="btn btn-light menu-type-button">Aperitivo</button>
                    <button type="submit" name="menuType" value="Plato_primero" class="btn btn-light menu-type-button">Primer plato</button>
                    <button type="submit" name="menuType" value="Plato_segundo" class="btn btn-light menu-type-button">Segundo plato</button>
                    <button type="submit" name="menuType" value="Bebidas" class="btn btn-light menu-type-button">Bebidas</button>
                </form>
            </div>
        @endif
            <div class="col-md-2 d-flex align-items-center">
                <div class="dropstart w-100 d-flex justify-content-end">    
                    <button type="button" class="btn btn-dark" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside" id="filter-button">Filter <i class="fa fa-filter" aria-hidden="true"></i></button>
                    <div class="dropdown-menu">
                        <form method="get" action="{{ route('filterMenu') }}" class="px-4 py-3 " style="min-width: 350px">    
                            <div class="mb-2">
                                <label for="ItemType" class="form-label">Item Type</label>
                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="itemTypeInputGroup">Type:</label>
                                    <select name="menuType" class="form-select" id="itemTypeInputGroup" >
                                        <option name="menuType" value="">All</option>
                                        <option name="menuType" value="Bocadillo">Bocadillo</option>
                                        <option name="menuType" value="Dulce">Dulce</option>
                                        <option name="menuType" value="Pan">Pan</option>
                                        <option name="menuType" value="Extra">Extra</option>
                                        <option name="menuType" value="Aperitivo">Aperitivo</option>
                                        <option name="menuType" value="Plato_primero">Primer plato</option>
                                        <option name="menuType" value="Plato_segundo">Segundo plato</option>
                                        <option name="menuType" value="Bebidas">Bebidas</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="dropdown-divider"></div>
                        
                            <div class="col-12 mb-3">
                                <label for="PriceRange" class="form-label">Price range</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">RM</span>
                                    <input name="fromPrice" type="text" class="form-control" placeholder="From Price" aria-label="From Price">
                                    <span class="input-group-text">~</span>
                                    <input name="toPrice" type="text" class="form-control" placeholder="To Price" aria-label="To Price">
                                </div>
                            </div>
                            
                            <div class="dropdown-divider"></div>                                                        
                   
                            <div class="dropdown-divider"></div>
                            <button type="submit" class="btn btn-outline-dark">Filter</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        


        <div class="d-flex flex-wrap mt-4 mb-5">
        @forelse ($menus as $menu)
            
            <div class="card col-md-3 col-6 d-flex align-items-center">
                <div class="card-body w-100">
                    <form class="d-flex flex-column justify-content-between h-100" action="{{ route('addToCart') }}" method="post">
                        @csrf
                        <div class="flex-center">
                            <img class="card-img-top menuImage" src="{{ asset('menuImages/' . $menu->image) }}">
                        </div>

                        <h5 class="card-title mt-3">
                            {{ $menu->name }} 
                        </h5>
                        
                        <h6 class="card-subtitle mb-2 text-muted">{{ $menu->description }}</h6>
                        
                        
                        <div class="d-flex justify-content-between">
                            <p class="card-text fs-5 fw-bold">{{ number_format($menu->price, 2) }} €</p>
                        </div>

                        <input name="menuID" type="hidden" value="{{ $menu->id }}">
                        <input name="menuName" type="hidden" value="{{ $menu->name }}">
                        @if (Auth::check())
                            @if (auth()->user()->role == 'customer')
                                <button type="submit" class="primary-btn w-100 mt-3">Añadir al carro</button>
                            @elseif (auth()->user()->role == 'admin')
                                <div class="dropdown w-100 mt-3">
                                    <a href="#" role="button" id="dropdownMenuLink" 
                                        data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                                        <button class="primary-btn w-100">Editar</button>
                                    </a>

                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <li><a class="dropdown-item" href={{"./editMenuImages/".$menu['id']}}>Editar imagen</a></li>
                                        <li><a class="dropdown-item" href={{"./editMenuDetails/".$menu['id']}}>Editar detalles</a></li>
                                        <li><a class="dropdown-item" href={{"./delete/".$menu['id']}}>Borrar</a></li>
                                    </ul>
                                </div>
                            @endif
                        @endif
                    </form>
                </div>
            </div>
        
        @empty
        <div class="row">
            <div class="col-12">
                <h1>No result found... <i class="fa fa-frown-o" aria-hidden="true"></i></h1>
            </div>
        </div>
        @endforelse
        </div>
    </div>
</section>
@endsection