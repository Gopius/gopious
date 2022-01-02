<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizPost extends Model
{
    use HasFactory;
    protected $fillable = [
    	'post_no',
    	'quiz_no',
    ];

    /**
     * QuizPost belongs to Quiz.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function quiz()
    {
    	// belongsTo(RelatedModel, foreignKey = quiz_id, keyOnRelatedModel = id)
    	return $this->belongsTo(Quiz::class, 'quiz_no', 'quiz_id');
    }
}
