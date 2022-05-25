<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    protected $fillable = [

        'degree',
        'university',
        'specialization',
        'start_date',
        'end_date',
        'description',

    ];
}
