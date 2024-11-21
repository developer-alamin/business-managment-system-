<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        'product_type',
        'gender',
        'parent_id',
        'note',
        'status',
        'date'
    ];

    public function investments()
    {
        return $this->hasMany(Investment::class);
    }

    public function members()
    {
        return $this->hasManyThrough(Member::class, Investment::class);
    }

}
