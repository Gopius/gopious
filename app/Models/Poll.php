<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Poll extends Model
{
    use HasFactory, SoftDeletes;
    protected $primaryKey = "poll_id";

    protected $fillable = [
        'poll_title',
        'end_date',
        'created_at',
        'cat_no',
        'instr_no',
    ];

    protected $casts = [
        'end_date' => 'datetime',
    ];

    /**
     * Poll belongs to Instructor.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function instructor()
    {
        // belongsTo(RelatedModel, foreignKey = instructor_id, keyOnRelatedModel = id)
        return $this->belongsTo(Instructor::class, 'instr_no', 'instr_id');
    }
    /**
     * Poll belongs to Category.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        // belongsTo(RelatedModel, foreignKey = category_id, keyOnRelatedModel = id)
        return $this->belongsTo(Category::class, 'cat_no', 'cat_id');
    }

    /**
     * Poll has many PollOptions.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function options()
    {
        // hasMany(RelatedModel, foreignKeyOnRelatedModel = poll_id, localKey = id)
        return $this->hasMany(PollOption::class, 'poll_no', 'poll_id');
    }


    public function allUserAttemptCount()
    {
        $sub_ops = $this->options()->with('learnerPollOption');
        // return $sub_ops;
        // $count = 0;
        // foreach ($sub_ops as $key => $sub_op) {
        //     $count += $sub_op->learnerPollOption->count();
        // }
        return $sub_ops;
    }

    /**
     * Poll belongs to Class.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function class()
    {
        // belongsTo(RelatedModel, foreignKey = class_id, keyOnRelatedModel = id)
        return $this->belongsTo(Category::class, 'cat_no', 'cat_id');
    }
}
