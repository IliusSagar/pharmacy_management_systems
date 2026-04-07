<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
       protected $fillable = ['patient_name','doctor_name','medicine_list'];

}
