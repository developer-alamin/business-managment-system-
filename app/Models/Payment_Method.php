<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment_Method extends Model
{
    use HasFactory;
    protected $table = 'payment_methods';
    protected $fillable = [
        'account_type', 
        'account_name', 
        'account_number', 
        'account_branch', 
        'opening_amount',
        'note',
        'status',
        'date'
    ];
}
