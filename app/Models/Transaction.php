<?php
// Programmer Name: Ms. Lim Jia Yong, Project Manager
// Description: Defines relationship of transaction table with other database tables
// Edited on: 1 March 2022

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'final_amount',
    ];

    public function discount() {
        return $this->belongsTo(Discount::class);
    }

    public function order() {
        return $this->belongsTo(Order::class);
    }
}
