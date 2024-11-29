<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attributes extends Model
{
    use HasFactory;
    protected $table = 'attributes';
    protected $fillable = ['category','type','slug','status'];
    public function values()
    {
        return $this->hasMany(Attribute_Value::class, 'attribute_id');
    }
    
    public static function rules()
    {
        return [
            'slug'        => 'unique:attributes,slug',
        ];
    }
    public static function msg() : array {
        return [
            'type.unique' => "This Type Already Exits",
            'slug.unique' => 'This Slug Already Exits',
        ];
    }
}
