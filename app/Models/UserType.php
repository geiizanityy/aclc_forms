<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;

class UserType extends Model
{
    use HasFactory,Uuid;

    protected $table = 'user_type';
    protected $fillable = [
        'id',
        'user_type'
    ];

}
