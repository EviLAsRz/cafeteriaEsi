<?php
// Programmer Name: Ms. Lim Jia Yong, Project Manager
// Description: Defines relationship of menu table with other database tables
// Edited on: 1 March 2022

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'type',
        'name',
        'description',
        'price',
        'image',
        'size',
        'allergic',
        'vegetarian',
        'vegan'
    ];

    public function cartItems() {
        return $this->hasMany(CartItem::class);
    }
}
