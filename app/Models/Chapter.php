<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    use HasFactory;
    protected $primaryKey = "chapter_id";

    /**
     * Fields that can be mass assigned.
     *
     * @var array
     */
    protected $fillable = [
    	'chapter_title',
    	'course_no',
    ];

    /**
     * Chapter has many Blocks.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function blocks()
    {
    	// hasMany(RelatedModel, foreignKeyOnRelatedModel = chapter_id, localKey = id)
    	return $this->hasMany(Block::class, 'chapter_no', 'chapter_id');
    }

    /**
     * Chapter belongs to Quizzes.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function quizzes()
    {
        // belongsTo(RelatedModel, foreignKey = quiz_id, keyOnRelatedModel = id)
        return $this->belongsToMany(Quiz::class, 'chapter_quizzes', 'chapter_no', 'quiz_no','chapter_id', 'quiz_id');
    }

    /**
     * Chapter has many Chapter_quizzes.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function chapter_quizzes()
    {
        // hasMany(RelatedModel, foreignKeyOnRelatedModel = chapter_id, localKey = id)
        return $this->hasMany(ChapterQuiz::class, 'chapter_no', 'chapter_id');
    }
}
