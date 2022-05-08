<?php
// Programmer Name: Ms. Lim Jia Yong, Project Manager
// Description: Defines relationship of discount table with other database tables
// Edited on: 1 March 2022

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory;

    protected $fillable = [
        'discountCode', 'percentage', 'minSpend', 'cap',
        'startDate', 'endDate', 'description',
    ];

    // discount can be used in many transactions
    public function transactions() {
        return $this->hasMany(Transaction::class);
    }
}
