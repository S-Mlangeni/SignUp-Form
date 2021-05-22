<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Userdata extends Model
{
    use HasFactory;
    protected $table = "formdata"; /* specifies the table to
    connect to since the typical naming convention is not used (i.e. 
    Pizza model for Pizzas table, Device model for Devices table,
    etc.). If the naming convention is used then this line is not
    necessary. */
}
