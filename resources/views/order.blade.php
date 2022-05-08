
@extends('layouts.app')

@section('links')
    <link href="{{ asset('css/order.css') }}" rel="stylesheet">
@endsection

@section('bodyID')
{{ 'order' }}@endsection

@section('navTheme')
{{ 'light' }}@endsection

@section('logoFileName')
{{ URL::asset('/images/logo.png') }}@endsection


@section('content')
@if (!$activeOrder && !$allOrders->count())
<!-- Cuando el usuario aun no ha realizado un pedido -->
<section class="empty-order min-vh-100 pt-5 flex-center">
    <div class="container d-flex flex-column justify-content-center align-items-center">
        <div class="hero-wrapper">
            <img src="{{ URL::asset('/images/empty_order.svg') }}" alt="">
        </div>
        <h3 class="mt-4 mb-2">No hay pedidos aun.</h3>
        <p class="text-muted">Parece que aun no has hecho tu elección...</p>
        
        <a href="{{ route('menu') }}"><button class="primary-btn mt-3">¡Descubre el menú!</button></a>
    </div>
</section>
@elseif ($activeOrder)
<!-- todo - 
cosas de éxito de la sesión -->
<section class="active-order d-flex">
    <div class="container">
        <div class="order-metadata mb-4">
            <div class="d-flex">
                <h2>Pedido #{{ $activeOrder->id }}</h2>
                @if ($activeOrder->completed)
                <div class="mx-5 px-3 alert alert-success">
                    Fulfilled
                </div>
                @else
                <div class="mx-5 px-3 alert alert-warning">
                    Not fulfilled
                </div>
                @endif
            </div>
            <div class="d-flex">
                <p class="text-muted">{{ $activeOrder->getOrderDate() }}</p>
                <p class="px-3 text-muted">{{ $activeOrder->getOrderTime() }}</p>
            </div>
        </div>

        <div class="row">
            <div class="order-cart p-4 mb-5 col-lg-8 col-md-12">
                <h3 class="pb-4 px-2">Your cart</h3>
                <div class="flex-center flex-column order-cart-items">
                @foreach ($activeOrder->cartItems as $orderItem)
                    <div class="order-cart-item d-flex justify-content-around">
                        <div class="food-img-wrapper">
                            <img class="order-food shadow" src="{{ asset('menuImages/' . $orderItem->menu->image) }}">
                        </div>
                        <div class="food-desc-wrapper">
                            <div class="d-flex justify-content-between">
                                <h5>{{ $orderItem->menu->name }}</h5>
                                @if ($orderItem->fulfilled)
                                    <div class="px-3 alert alert-success">
                                        Fulfilled
                                    </div>  
                                @else
                                    <div class="px-3 alert alert-warning">
                                        Not fulfilled
                                    </div>  
                                @endif
                            </div>
                            <div class="mobile d-flex pt-2">
                                <p class="price">RM {{ number_format($orderItem->menu->price, 2) }}</p>
                                <p class="quantity">x{{ $orderItem->quantity }}</p>
                                <p class="cart-item-total">RM {{ number_format($orderItem->menu->price * $orderItem->quantity, 2) }}</p>        
                            </div>
                            <p class="text-muted desktop">{{ $orderItem->menu->description }}</p>
                        </div>
                        <p class="price desktop">RM {{ number_format($orderItem->menu->price, 2) }}</p>
                        <p class="quantity desktop">x{{ $orderItem->quantity }}</p>
                        <p class="cart-item-total desktop">RM {{ number_format($orderItem->menu->price * $orderItem->quantity, 2) }}</p>
                    </div>
                    <hr>
                @endforeach
                </div>
            </div>

            <div class="order-summary p-4 col-lg-3 offset-lg-1 col-md-12">
                <h3 class="pb-3">Summary</h3>
                <div class="d-flex justify-content-between">
                    <h6>Subtotal</h6>
                    <p>RM {{ $subtotal = $activeOrder->getSubtotal() }}</p>
                </div>
                <div class="d-flex justify-content-between">
                    <h6>Discount</h6>
                    <p>-RM {{ $discount = $activeOrder->getDiscount($subtotal) }}</p>
                </div>
                <div class="d-flex justify-content-between">
                    <h6>Tax (6%)</h6>
                    <p>RM {{ $tax = $activeOrder->getTax($subtotal, $discount) }}</p>
                </div>
                <hr>
                <div class="d-flex justify-content-between">
                    <h6>Total</h6>
                    <p>RM {{ $activeOrder->getTotal($subtotal, $discount, $tax) }}</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endif

@if ($allOrders->count())
@if(!$activeOrder)
<div class="pt-18vh">
@endif
<section class="order-histories">
    <div class="container">
        <h2 class="mb-4">Pedidos previos</h2>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Pedido ID</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Hora</th>
                    <th scope="col">Precio final</th>
                    <th scope="col">Estado</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($allOrders as $order)
                @if ($activeOrder && $activeOrder->id == $order->id)
                <tr class="table-active">
                @else
                <tr>
                @endif
                    <th scope="row"><a href="{{ route('specificOrder', $order->id) }}">#{{ $order->id }}</a></th>
                    <td>{{ $order->getOrderDate() }}</td>
                    <td>{{ $order->getOrderTime() }}</td>
                    <td>RM {{ $order->getTotalFromScratch() }}</td>
                    <td>
                        @if ($order->completed)
                            <div class="px-3 alert alert-success">
                                Completado
                            </div>  
                        @else
                            <div class="px-3 alert alert-warning">
                                No completado
                            </div>  
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="row mt-md-4">
            <div class="col-12 flex-center">
                {{ $allOrders->links() }}
            </div>
        </div>
    </div>
</section>
@if(!$activeOrder)
</div>
@endif
@endif
@endsection