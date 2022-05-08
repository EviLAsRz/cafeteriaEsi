<?php
// Programmer Name: Ms. Lim Jia Yong, Project Manager
// Description: Direct admin to dashboard page, kitchen staff to order page,
//              and other users to home page
// Edited on: 30 March 2022

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
        if (Auth::user() && auth()->user()->role == 'admin')
            return redirect()->route('dashboard');
        else if (Auth::user() && auth()->user()->role == 'kitchenStaff')
            return redirect()->route('kitchenOrder');
        return view('home');
    }
}
