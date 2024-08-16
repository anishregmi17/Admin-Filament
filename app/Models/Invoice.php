<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invoice extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['food_ordering_id', 'amount', 'status'];

    public function foodOrdering()
    {
        return $this->belongsTo(FoodOrdering::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}
