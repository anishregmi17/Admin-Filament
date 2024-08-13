<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class FoodItem extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['name', 'descriptions', 'image', 'price', 'availability'];
}
