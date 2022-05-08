<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\User;


class DashboardController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        if (auth()->user()->role != 'admin')
            abort(403, 'This route is only meant for admin.');

        $totalOrders = Transaction::get()->count();

        // calculate number of customer
        $numCustomer = User::where("role", "customer")->count();
        
        return view('dashboard', compact("totalOrders", "numCustomer")); 
    }
}
