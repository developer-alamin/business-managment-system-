<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Investor extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'phone',
        'alt_phone',
        'photo',
        'address',
        'attachments'
    ];
    public static function validationRules()
    {
        return [
            'name'         => 'required',
            'email'        => 'required|email|unique:investors,email',
            'phone'        => 'required',
            'alt_phone'    => 'nullable',
            'photo'        => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp',
            'attachment'   => 'nullable|mimes:pdf|max:10240', // PDF validation (10MB max)
            'address'      => 'nullable'
        ];
    }
    public static function RulesMsg() : array {
        return [
            'name.required' => "Please Enter Name",
            'email.required' => "Please Enter Email",
            'email.email' => "Please Email",
            'email.unique' => "Your Email Already Exits",
            'photo.image' => "Please Image Select",
            'photo.mimes' => "Please Image Type",
            'attachment.mimes' => "Please Pdf Select"
        ];
    }
}
