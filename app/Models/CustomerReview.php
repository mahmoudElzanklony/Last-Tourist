<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerReview extends Model
{
    use HasFactory;
        protected $table = 'customer_reviews';

        protected $fillable = [
            'service_id',
            'user_id',
            'customer_name',
            'content',
            'rating',
        ];
    public function customerReviews()
    {
        return $this->hasMany(CustomerReview::class, 'service_id');
    }
}
