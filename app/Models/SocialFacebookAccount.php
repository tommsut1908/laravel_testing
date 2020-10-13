<?php

namespace App\Models;

use App\Http\Middleware\Authenticate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialFacebookAccount extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'name','provider_user_id', 'provider'];
}
