<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobPost extends Model
{
    use HasFactory;

    protected $table = 'job_posts';
    protected $primaryKey = 'jobID';

    protected $fillable = [
        'jobTitle',
        'jobLocation',
        'jobDescription',
        'jobRequirements',
        'companyID',
        'categoryID',
        'deadline',
    ];
}
