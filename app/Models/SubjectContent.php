<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubjectContent extends Model
{
    use HasFactory;

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $table = 'subject_contents';
    protected $primaryKey = 'subjectcontent_id';

    protected $fillable = [
        'topic_no',
        'topic_desc',
        'topic_content',
        'topic_slug',
        'topic_status',
        'topic_type',
        'subject_id'
    ];
}
