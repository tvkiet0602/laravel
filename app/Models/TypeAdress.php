<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TypeAdress extends Model
{
    use HasFactory;
    protected $table = 'typeAddress';

    public function address()
    {
        return $this->hasMany('App\Models\Address', 'typeAddress_id', 'id');
    }
}
