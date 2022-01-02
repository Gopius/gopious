<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Quiz extends Model
{
    use HasFactory, SoftDeletes;
    protected $primaryKey = "quiz_id";

    protected $fillable = [
        'quiz_title',
        'start_date',
        'end_date',
        'course_no',
        'instr_no',
        'duration',
        'alway_open',
    ];


    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
    ];

    /**
     * Quiz belongs to Course.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function course()
    {
        // belongsTo(RelatedModel, foreignKey = course_id, keyOnRelatedModel = id)
        return $this->belongsTo(Course::class, 'course_no', 'course_id');
    }

    /**
     * Quiz has many Questions.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function questions()
    {
        // hasMany(RelatedModel, foreignKeyOnRelatedModel = quiz_id, localKey = id)
        return $this->hasMany(QuizQuestion::class, 'quiz_no', 'quiz_id');
    }


    /**
     * Quiz belongs to Instructor.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function instructor()
    {
        // belongsTo(RelatedModel, foreignKey = instructor_id, keyOnRelatedModel = id)
        return $this->belongsTo(Instructor::class, 'instr_no', 'instr_id');
    }
}
