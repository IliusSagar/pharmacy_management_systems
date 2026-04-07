<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
        protected $fillable = ['supplier_id','medicine_id','quantity','price','purchase_date'];

}
