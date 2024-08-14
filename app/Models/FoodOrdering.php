<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class FoodOrdering extends Model
{
    use HasFactory;
    use SoftDeletes;


    protected $fillable = ['customer_id', 'food_item_id', 'quantity', 'status'];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function foodItem()
    {
        return $this->belongsTo(FoodItem::class);
    }
}
