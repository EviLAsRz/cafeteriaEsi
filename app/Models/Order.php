<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'dateTime',
        'type',
    ];

    public function getOrderDate() {
        $dateTime = $this->dateTime;
        return substr($dateTime, 0, 10);
    }
    
    public function getOrderTime() {
        $dateTime = $this->dateTime;
        return substr($dateTime, 11, 16);
    }

    public function getSubtotal() {
        $totalPrice = 0;
        foreach($this->cartItems as $item) 
            $totalPrice += $item->menu->price * $item->quantity;
        return $this->currencyFormat($totalPrice);
    }

    public function getTotal($subtotal) {
        return $this->currencyFormat($subtotal);
    }

    public function getTotalFromScratch() {
        $subtotal = $this->getSubtotal();
        return $this->currencyFormat($subtotal);
    }

    public function getTotalCost() {
        $totalCost = 0;
        foreach ($this->cartItems as $item) {
            $totalCost += floatval($item->menu->estCost) * floatval($item->quantity);
        }
        return $this->currencyFormat($totalCost);
    }

    public function currencyFormat($number) {
        return number_format((float)$number, 2, '.', '');
    }
  
    // RELATIONSHIPS
    public function user() {
        return $this->belongsTo(User::class);
    }

    public function cartItems() {
        return $this->hasMany(CartItem::class);
    }

    public function transaction() {
        return $this->hasOne(Transaction::class);
    }
}
