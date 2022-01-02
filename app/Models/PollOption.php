<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PollOption extends Model
{
    use HasFactory;

    protected $fillable = [
    	'poll_option_title',
    	'poll_no',
    ];

    /**
     * PollOption has many LearnerPollOption.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function learnerPollOption()
    {
    	// hasMany(RelatedModel, foreignKeyOnRelatedModel = pollOption_id, localKey = id)
    	return $this->hasMany(LearnerPollOption::class, 'poll_option_no', 'poll_option_id');
    }
}
