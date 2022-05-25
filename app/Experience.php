<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    protected $fillable = [

        'company_name',
        'work_title',
        'start_date',
        'end_date',
        'description',

    ];
}
