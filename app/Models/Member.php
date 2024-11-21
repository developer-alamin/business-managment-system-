<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        'member_id',
        'name',
        'father',
        'phone',
        'alt_phone',
        'address',
        'date',
        'refer_by'
    ];
    // Define the relationship between Member and Product through the Investment model
    public function investments()
    {
        return $this->hasMany(Investment::class);
    }

    public function products()
    {
        return $this->belongsToMany(Products::class, 'investments','member_id','product_id');
    }
}
