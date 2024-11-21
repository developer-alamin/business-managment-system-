<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = ['doctor_id','member_id','product_id','service_type_id','note'];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
     // Define the relationship with ServiceType
     public function serviceType()
     {
         return $this->belongsTo(ServiceType::class);
     }
      // Define the relationship with Products
    public function product()
    {
        return $this->belongsTo(Products::class);
    }
    public function member()
    {
        return $this->belongsTo(Member::class);
    }
}
