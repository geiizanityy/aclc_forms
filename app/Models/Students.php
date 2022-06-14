<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Traits\Uuid;

class Students extends Model
{
    use HasFactory;

    use HasFactory,Uuid;

    protected $primaryKey = 'id';

    protected $table = 'teachers';

    protected $fillable = [
        'id',
        'student_fname',
        'student_mname',
        'student_lname',
        'students_suffix',
        'students_contact',
        'is_active',
        'date_registered',
        'user_id',

    ];
}
