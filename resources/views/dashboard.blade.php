<!-- 
    Programmer 1: Mr. Tan Wei Kang, Developer
    Programmer 2: Ms. Lim Jia Yong, Project Manager
    Description: Renders graphs and charts for data analysis
    Edited on: 29 March 2022
 -->
 
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

<!-- todo - session success stuff -->
<section class="container">
    <div class="row mt-5">
        <div class="col mt-lg-0 mt-5">
            <h1 class="mt-lg-0 mt-3">Dashboard</h1>
        </div>
        <div class="col-lg-5 col-12 d-flex justify-content-center mt-lg-0 mt-5">
            <div class="col-11 flex-center py-2 shadow rounded bg-white">
            <div class="flex-center">
            <img src="{{ URL::asset('/images/calendar.svg') }}" style="height: 32px; width: 32px;">
            </div>
            <p class="flex-center mt-lg-0 px-3">From: {{ $startDate }}</p>
            <p class="flex-center mt-lg-0 px-3">To: {{ $today }} </p>
            </div>
        </div>
    </div>

    <!-- first row -->
    <div class="row my-5 justify-content-between">
        <div class="col-lg-4 col-12 mb-lg-0 mb-3 flex-center">
            <div id="generated-revenue" class="col-11 pt-3 h-100 shadow rounded bg-white" 
                    data-daily="{{ $dailyRevenue }}" data-total="{{ $totalRevenue }}">
            </div>
        </div>
        <div class="col-lg-4 col-12 mb-lg-0 mb-3 flex-center">
            <!-- TODO -->
            <div id="estimated-cost" class="col-11 p-3 h-100 shadow rounded bg-white"> 
                <h5 class="text-center">Estimated Cost</h5>
                <h2 class="my-4 apexcharts-yaxis-title fw-bold text-center">RM {{ number_format($totalCost, 2) }}</h2>
                <p class="small text-muted text-center">Total Cost of Materials</p>
            </div>
        </div>
        <div class="col-lg-4 col-12 mb-lg-0 mb-3 flex-center">
            <!-- TODO -->
            <div id="gross-profit" class="col-11 p-3 h-100 shadow rounded bg-white"> 
                <h5 class="text-center">Gross Profit</h5>
                <h2 class="my-4 apexcharts-yaxis-title fw-bold text-center">RM {{ number_format($grossProfit, 2) }}</h2>
                <p class="small text-muted text-center">Difference of Revenue and Cost</p>
            </div>
        </div>
    </div>

    <!-- TODO - second row -->
    <div class="row mt-5 justify-content-center">
        <div class="col-lg-4 col-12 mb-lg-0 mb-3 flex-center">
            <div id="orders" class="col-11 p-3 h-100 shadow rounded bg-white"> 
                <h5 class="text-center">Total Orders</h5>
                <h2 class="my-4 apexcharts-yaxis-title fw-bold text-center">{{ $totalOrders }}</h2>
                <p class="small text-muted text-center">Number of orders being placed by now</p>
            </div>
        </div>
        <div class="col-lg-4 col-12 mb-lg-0 mb-3 flex-center">
            <div id="code-usage" class="col-11 p-3 h-100 shadow rounded bg-white">     
                <h5 class="text-center">Discount Code Usage</h5>
                <h2 class="my-4 apexcharts-yaxis-title fw-bold text-center">{{ $discountCodeUsed }} times</h2>
                <p class="small text-muted text-center">Discount code usage analysis</p>
            </div>
        </div>
        <div class="col-lg-4 col-12 mb-lg-0 mb-3 flex-center">
            <div id="customers" class="col-11 p-3 h-100 shadow rounded bg-white">    
                <h5 class="text-center">Total Customers</h5>
                <h2 class="my-4 apexcharts-yaxis-title fw-bold text-center">{{ $numCustomer }}</h2>
                <p class="small text-muted text-center">Customer base of the system</p>
            </div>
        </div>
    </div>

    <!-- TODO - third row - charts -->
    <!-- <div class="row my-5 justify-content-between">
        <div class="col-lg-6 col-12 mb-lg-0 mb-3 flex-center">
            <div id="order-revenue-chart" class="col-11 pt-3 h-100 shadow rounded bg-white"
                data-daily="{{ $dailyOrders }}" data-total="{{ $totalOrders }}">
            </div>
        </div>
        <div class="col-lg-6 col-12 mb-lg-0 mb-3 flex-center">
            <div class="col-11 pt-3 h-100 shadow rounded bg-white">
                sales of each menu category
                <h5>Pie chart</h5>
            </div>
        </div>
    </div> -->

    <!-- Third row - Order-Revenue Mixed Chart -->
    <div class="row my-5 justify-content-between">
        <div id="order-revenue-chart" class="col-12 pt-3 h-100 shadow rounded bg-white"
            data-daily="{{ $dailyOrders }}" data-total="{{ $totalOrders }}">
        </div>
    </div>

    <!-- Forth row - Menu Category Pie Chart -->
    <div class="row my-5 justify-content-between">
        <div id="category-sales-chart" class="col-12 pt-3 h-100 shadow rounded bg-white"
            data-sales="{{ $categoricalSales }}">
        </div>
    </div>

    <!-- Fifth row - Best Selling Menu Bar Chart -->
    <div class="row my-5 justify-content-between">
        <div id="best-selling-product-chart" class="col-12 pt-3 h-100 shadow rounded bg-white"
            data-sales="{{ $finalProductSales }}">
        </div>
    </div>
</section>


@endsection