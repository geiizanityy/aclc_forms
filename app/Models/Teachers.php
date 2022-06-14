<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Traits\Uuid;

class Teachers extends Model
{
    use HasFactory,Uuid;

    protected $primaryKey = 'id';

    protected $table = 'teachers';

    protected $fillable = [
        'id',
        'teacher_fname',
        'teacher_mname',
        'teacher_lname',
        'teacher_suffix',
        'teacher_contact',
        'is_active',
        'date_registered',
        'user_id',

    ];

}
