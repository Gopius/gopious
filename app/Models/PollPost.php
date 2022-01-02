<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PollPost extends Model
{
    use HasFactory;
    protected $fillable = [
    	'post_no',
    	'poll_no',
    ];

    /**
     * PollPost belongs to Poll.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function poll()
    {
    	// belongsTo(RelatedModel, foreignKey = poll_id, keyOnRelatedModel = id)
    	return $this->belongsTo(Poll::class, 'poll_no', 'poll_id');
    }
}
