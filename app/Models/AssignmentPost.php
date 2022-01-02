<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignmentPost extends Model
{
    use HasFactory;

    protected $fillable = [
    	'post_no',
    	'ass_no',
    ];

    /**
     * AssignmentPost belongs to Assignment.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function assignment()
    {
    	// belongsTo(RelatedModel, foreignKey = assignment_id, keyOnRelatedModel = id)
    	return $this->belongsTo(Assignment::class, 'ass_no', 'ass_id');
    }
}
