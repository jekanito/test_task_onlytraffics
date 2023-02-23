<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Questionnaire;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function questionnaires()
    {
        return $this->belongsToMany(Questionnaire::class);
    }
}
