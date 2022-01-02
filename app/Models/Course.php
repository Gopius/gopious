<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use HasFactory, SoftDeletes;
    protected $primaryKey = "course_id";

    /**
     * Fields that can be mass assigned.
     *
     * @var array
     */
    protected $fillable = [
        'course_title',
        'course_desc',
        'course_status',
        'course_cover_img_url',

        'cat_no',
        'instr_no',

    ];


    /**
     * Course belongs to Category.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        // belongsTo(RelatedModel, foreignKey = category_id, keyOnRelatedModel = id)
        return $this->belongsTo(Category::class, 'cat_no', 'cat_id');
    }

    /**
     * Course has many Chapters.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function chapters()
    {
        // hasMany(RelatedModel, foreignKeyOnRelatedModel = course_id, localKey = id)
        return $this->hasMany(Chapter::class, 'course_no', 'course_id');
    }

    /**
     * Course belongs to Instructor.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function instructor()
    {
        // belongsTo(RelatedModel, foreignKey = instructor_id, keyOnRelatedModel = id)
        return $this->belongsTo(Instructor::class, 'instr_no', 'instr_id');
    }
}
