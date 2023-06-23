<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';

    protected $fillable = [
        'service_id',
        'user_id',
        'customer',
        'order_date',
        'total_amount',
        'payment_type',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function service()
    {
        return $this->belongsTo(Services::class);
    }
}
