<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;
    protected $fillable = [
        'expense_type',
        'purchase_type',
        'product_id',
        'payment_method_id',
        'payment_info',
        'amount',
        'description',
        'date'
    ];
    public function product()
    {
        return $this->belongsTo(Products::class);
    }
    public function method()
    {
        return $this->belongsTo(Payment_Method::class,'payment_method_id','id');
    }
}
