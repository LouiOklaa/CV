<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    protected $fillable = [
        'name',
        'age',
        'phone_number',
        'address',
        'language',
        'work',
        'about_me',
        'profile_photo',
        'cover_photo',
        'contact_me_photo',
        'CV_pdf',
    ];
}
