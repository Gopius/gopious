<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizOption extends Model
{
    use HasFactory;

    protected $primaryKey = "quiz_option_id";

    protected $fillable = [
    	'quiz_option_title',
    	'is_correct',
    	'quiz_question_no',
    ];

    /**
     * QuizOption belongs to QuizQuestion.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function quizQuestion()
    {
    	// belongsTo(RelatedModel, foreignKey = quizQuestion_id, keyOnRelatedModel = id)
    	return $this->belongsTo(QuizQuestion::class, 'quiz_question_no', 'quiz_option_id' );
    }
}
