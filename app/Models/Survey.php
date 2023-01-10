<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Survey extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'name'
    ];

    public function survey_questions()
    {
        return $this->hasMany('App\Models\SurveyQuestion');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
