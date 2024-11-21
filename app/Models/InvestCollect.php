<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvestCollect extends Model
{
    use HasFactory;
    protected  $table = 'investment__collections';
    protected $fillable = [
        'investor_id','month','year','amount'
    ];

    public function investor()
    {
        return $this->belongsTo(Investor::class);
    }
}
