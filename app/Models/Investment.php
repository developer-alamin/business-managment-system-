<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Investment extends Model
{
    use HasFactory;

    protected $fillable = [
        'member_id',
        'product_id',
        'investment_qty',
        'note',
        'date'
    ];
    public function product()
    {
        return $this->belongsTo(Products::class);
    }
    public function member()
    {
        return $this->belongsTo(Member::class);
    }
}
