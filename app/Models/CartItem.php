<?php
// Programmer Name: Ms. Lim Jia Yong, Project Manager
// Description: Defines relationship of cart item table with other database tables
// Edited on: 1 March 2022

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'menu_id',
        'order_id',
        'quantity',
        'fulfilled',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function menu() {
        return $this->belongsTo(Menu::class);
    }

    public function order() {
        return $this->belongsTo(Order::class);
    }
}
