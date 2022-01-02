<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\Auth;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
    	'content',
    	'type',
    	'cat_no',
    ];

    /**
     * Post belongs to Class.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function class()
    {
    	// belongsTo(RelatedModel, foreignKey = class_id, keyOnRelatedModel = id)
    	return $this->belongsTo(Category::class, 'cat_no', 'cat_id');
    }

    /**
     * Post has one PostInstructor.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function post_instructor()
    {
    	// hasOne(RelatedModel, foreignKeyOnRelatedModel = post_id, localKey = id)
    	return $this->hasOne(PostInstructor::class, 'post_no');
    }

    /**
     * Post has one Post_learner.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function post_learner()
    {
        // hasOne(RelatedModel, foreignKeyOnRelatedModel = post_id, localKey = id)
        return $this->hasOne(PostLearner::class, 'post_no');
    }

    /**
     * Post has many Attachments.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function attachments()
    {
    	// hasMany(RelatedModel, foreignKeyOnRelatedModel = post_id, localKey = id)
    	return $this->hasMany(PostAttachment::class, 'post_no');
    }

    /**
     * Post has many Comments.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
    	// hasMany(RelatedModel, foreignKeyOnRelatedModel = post_id, localKey = id)
    	return $this->hasMany(CommentPost::class, 'post_no');
    }

    /**
     * Post has many Likes.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function likes()
    {
    	// hasMany(RelatedModel, foreignKeyOnRelatedModel = post_id, localKey = id)
    	return $this->hasMany(PostLike::class, 'post_no');
    }

    /**
     * Post has one PollPost.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function pollPost()
    {
    	// hasOne(RelatedModel, foreignKeyOnRelatedModel = post_id, localKey = id)
    	return $this->hasOne(PollPost::class, 'post_no');
    }

    /**
     * Post has one AssignmentPost.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function assignmentPost()
    {
    	// hasOne(RelatedModel, foreignKeyOnRelatedModel = post_id, localKey = id)
    	return $this->hasOne(AssignmentPost::class, 'post_no');
    }

    /**
     * Post has one QuizPost.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function quizPost()
    {
    	// hasOne(RelatedModel, foreignKeyOnRelatedModel = post_id, localKey = id)
    	return $this->hasOne(QuizPost::class, 'post_no');
    }

    /**
     * Post has one CoursePost.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function coursePost()
    {
    	// hasOne(RelatedModel, foreignKeyOnRelatedModel = post_id, localKey = id)
    	return $this->hasOne(CoursePost::class, 'post_no');
    }

    /**
     * Post has one Instructor_like.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function instructor_like()
    {
    	// hasOne(RelatedModel, foreignKeyOnRelatedModel = post_id, localKey = id)
    	return $this->hasOne(PostLike::class, 'post_no')->where('instr_no', Auth::guard('instructor')->user()->instr_id);
    }

    /**
     * Post has one Learner_like.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function learner_like()
    {
        // hasOne(RelatedModel, foreignKeyOnRelatedModel = post_id, localKey = id)
        return $this->hasOne(PostLike::class, 'post_no')->where('learner_no', Auth::guard('learner')->user()->learner_id);
    }
}
