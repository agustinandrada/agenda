<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
     protected $fillable = [
        'name',
        'last_name',
        'number',
        'email',
        'address'
    ];
}
