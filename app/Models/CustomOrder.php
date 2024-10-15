<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomOrder extends Model
{
    use HasFactory;

    protected $fillable = [
       'name',
        'email',
        'phone',
        'address',
        'user_id',
        'cake_flavor',
        'cake_filling',
        'cake_icing',
        'tiers',
        'cake_shape',
        'cake_size_width',
        'cake_size_height',
        'theme',
        'cupcakes',
        'candles',
        'candle_numbers',
        'pickup_delivery',
        'image1',
        'image2',
        'image3',
        'additional_info',
        'card_message',
        'delivery_time',
        'delivery_date',
        'delivery_status',
        'total_price'
    ];
}
