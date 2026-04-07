<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = ['medicine_id', 'customer_name', 'quantity', 'total_price', 'prescription_id'];
}
