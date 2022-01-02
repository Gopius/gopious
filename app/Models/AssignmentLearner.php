<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignmentLearner extends Model
{
    use HasFactory;

    protected $fillable = [
    	'ass_answer',
    	'learner_no',
    	'ass_no',
    	
    ];

    /**
     * AssignmentLearner belongs to Learner.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function learner()
    {
    	// belongsTo(RelatedModel, foreignKey = learner_id, keyOnRelatedModel = id)
    	return $this->belongsTo(Learner::class, 'learner_no', 'learner_id');
    }

    /**
     * AssignmentLearner has many Attachments.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function attachments()
    {
    	// hasMany(RelatedModel, foreignKeyOnRelatedModel = assignmentLearner_id, localKey = id)
    	return $this->hasMany(Attachment::class, 'ass_learner_no', 'id');
    }
}
