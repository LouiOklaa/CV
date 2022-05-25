<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable = [

        'project_title',
        'project_link',
        'project_image',

    ];
}
