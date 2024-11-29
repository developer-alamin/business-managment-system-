<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    use HasFactory;

    protected $table = 'incomes';
    protected $fillable = [
        'income_type',
        'seles_type',
        'product_id',
        'payment_method_id',
        'payment_info',
        'amount',
        'date',
        'description'
    ];

    public function product(){
        return $this->belongsTo(Products::class);
    }
    public function method(){
        return $this->belongsTo(Payment_Method::class,'payment_method_id','id');
    }
}
