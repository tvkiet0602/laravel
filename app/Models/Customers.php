<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Customers extends Model
{
    use HasFactory;
    protected $table = 'customers';
    public $timestamps = false;

    protected $fillable = ['name', 'gender', 'email', 'username', 'password'];

    public function address()
    {
        return $this->hasMany('App\Models\Address', 'customer_id', 'id');
    }

}
