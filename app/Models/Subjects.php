<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subjects extends Model
{
    use HasFactory;

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $table = 'subjects';
    protected $primaryKey = 'subject_id';

    protected $fillable = [
        'subject_code',
        'subject_name',
        'course',
        'subject_description',
        'banner',
    ];

}
