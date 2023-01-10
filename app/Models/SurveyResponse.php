<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SurveyResponse extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'survey_question_id',
        'user_id',
        'vote'
    ];

    public function survey_question()
    {
        return $this->belongsTo('App\Models\SurveyQuestion');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
