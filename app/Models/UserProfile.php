<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    use HasFactory;
    // app/UserProfile.php
    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'bio',
        ' avatar ',
        'role',
        'email',
        'phone',
        'mobile',
        'address',
        'skype_url',
        'facebook_url',
        'instagram_url',
        'twitter_url'
    ];


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


}
