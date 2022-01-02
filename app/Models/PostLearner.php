<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostLearner extends Model
{
    use HasFactory;
    protected $fillable = [
    	'post_no',
    	'learner_no',
    ];

    /**
     * PostLearner belongs to Learner.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function learner()
    {
    	// belongsTo(RelatedModel, foreignKey = learner_id, keyOnRelatedModel = id)
    	return $this->belongsTo(Learner::class, 'learner_no', 'learner_id');
    }
}
