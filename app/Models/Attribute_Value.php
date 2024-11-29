<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribute_Value extends Model
{
    use HasFactory;
    protected $table = 'attribute_values';
    protected $fillable = ['value','attribute_id','status'];
    
    public function attribute(){
        return $this->belongsTo(Attributes::class);
    }
}
