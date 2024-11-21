<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;
    protected $fillable = ['name','email','phone','photo','address'];
    public static function validationRules()
    {
        return [
            'email'        => 'email|unique:doctors,email',
            'phone'        => 'unique:doctors,phone',
            'photo'        => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp',
        ];
    }
    public static function RulesMsg() : array {
        return [
            'email.unique' => "Your Email Already Exits",
            'phone.unique' => 'Your Phone Already Exits',
            'photo.image'  => "Please Image Select",
            'photo.mimes'  => "Please Image Type",
        ];
    }
}
