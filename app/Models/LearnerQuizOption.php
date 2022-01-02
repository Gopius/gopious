<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LearnerQuizOption extends Model
{
    use HasFactory;

    /**
     * Fields that can be mass assigned.
     *
     * @var array
     */
    protected $fillable = [
    	'quiz_question_no',
    	'learner_no',
        'quiz_option_no',
    	'content',
    ];

    /**
     * LearnerQuizOption has many Options.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function options()
    {
        // hasMany(RelatedModel, foreignKeyOnRelatedModel = learnerQuizOption_id, localKey = id)
        return $this->hasMany(QuizOption::class, 'quiz_question_no', 'quiz_question_no');
    }
}
