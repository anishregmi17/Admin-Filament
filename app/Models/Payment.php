<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use HasFactory;
    use softDeletes;
    protected $fillable = ['invoice_id', 'amount', 'method'];

    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }
}
