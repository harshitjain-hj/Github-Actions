<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'user_type', 'looking_for', 'interested_in', 'can_relocate', 'can_relocate_to_city', 'stream' , 'college', 'semester' ,'graduation' ,'interested_roles', 'skills'
    ];
}
