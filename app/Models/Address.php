<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    protected $table = 'address';
    public $timestamps = false;

    protected $fillable = ['number', 'street', 'district', 'city', 'typeAddress_id', 'customer_id'];
}
