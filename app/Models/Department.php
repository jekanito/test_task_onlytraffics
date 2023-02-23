<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Questionnaire;

class Department extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description'
    ];

    public function questionnaires()
    {
        return $this->hasMany(Questionnaire::class);
    }
}
