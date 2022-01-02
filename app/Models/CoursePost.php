<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoursePost extends Model
{
    use HasFactory;
    protected $fillable = [
    	'post_no',
    	'course_no',
    ];

    /**
     * CoursePost belongs to Course.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function course()
    {
    	// belongsTo(RelatedModel, foreignKey = course_id, keyOnRelatedModel = id)
    	return $this->belongsTo(Course::class, 'course_no', 'course_id');
    }
}
