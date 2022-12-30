<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable=[
        'user_id',
        'payment_mode',
        'fullname',
        'email',
        'tracking_number',
        'phone_number',
        'payment_id',
        'pincode',
        'address',
        'status_message'
    ];
}
