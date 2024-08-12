<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RestaurantStaff extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $fillable=['name','role','contact']
}
