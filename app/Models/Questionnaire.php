<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\{
    Department,
    Tag
};

class Questionnaire extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'photo',
        'job_title',
        'description',
        'department_id'
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
