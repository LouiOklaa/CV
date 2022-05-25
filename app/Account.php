<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $fillable = [
        'email',
        'facebook_link',
        'linkedin_link',
        'twitter_link',
        'instagram_link',
        'github_link',
    ];
}
