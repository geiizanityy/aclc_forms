<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubjectContent extends Model
{
    use HasFactory;

    protected $table = 'subject_contents';
    protected $primaryKey = 'subjectcontent_id';

    protected $fillable = [
        'topic_no',
        'topic_desc',
        'topic_content',
        'topic_status',
        'topic_type',
    ];
}
