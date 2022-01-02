<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostInstructor extends Model
{
    use HasFactory;
    protected $fillable = [
    	'post_no',
    	'instr_no',
    ];

    /**
     * PostInstructor belongs to Instructor.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function instructor()
    {
    	// belongsTo(RelatedModel, foreignKey = instructor_id, keyOnRelatedModel = id)
    	return $this->belongsTo(Instructor::class, 'instr_no', 'instr_id');
    }
}
