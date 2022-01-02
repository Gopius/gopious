<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentPost extends Model
{
    use HasFactory;
    protected $fillable = [
    	'post_no',
    	'instr_no',
    	'learner_no',
    	'content',
    ];

    /**
     * CommentPost belongs to Instructor.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function instructor()
    {
    	// belongsTo(RelatedModel, foreignKey = instructor_id, keyOnRelatedModel = id)
    	return $this->belongsTo(Instructor::class, 'instr_no');
    }

    /**
     * CommentPost belongs to Learner.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function learner()
    {
        // belongsTo(RelatedModel, foreignKey = learner_id, keyOnRelatedModel = id)
        return $this->belongsTo(Learner::class, 'learner_no');
    }
}
