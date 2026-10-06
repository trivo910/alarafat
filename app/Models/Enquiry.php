<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'type',
        'package_id',
        'package_name',
        'message',
        'status',
    ];
}