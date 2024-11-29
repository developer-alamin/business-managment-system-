<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;
    protected $table = 'loans';
    protected $fillable = [
        'investor_id',
        'payment_method_id',
        'type',
        'amount',
        'date',
        'description'
    ];

    public function investor(){
        return $this->belongsTo(Investor::class);
    }
    public function method(){
        return $this->belongsTo(Payment_Method::class,'payment_method_id','id');
    }
}
