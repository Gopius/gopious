<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizQuestion extends Model
{
    use HasFactory;
    protected $primaryKey = "quiz_question_id";

    protected $fillable = [
    	'quiz_question_title',
        'type',
    	'score',
    	'multiple_select',
    	'quiz_no',
    ];

    /**
     * QuizQuestion has many Options.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function options()
    {
    	// hasMany(RelatedModel, foreignKeyOnRelatedModel = quizQuestion_id, localKey = id)
    	return $this->hasMany(QuizOption::class, 'quiz_question_no', 'quiz_question_id');
    }

    /**
     * QuizQuestion has many LearnerOptions.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function learnerOptions()
    {
        // hasMany(RelatedModel, foreignKeyOnRelatedModel = quizQuestion_id, localKey = id)
        return $this->hasMany(LearnerQuizOption::class, 'quiz_question_no' ,'quiz_question_id');
    }
}
