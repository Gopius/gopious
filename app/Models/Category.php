<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $primaryKey = "cat_id";

    protected $fillable = [
    	'cat_title',
    	'cat_desc',
    	'cat_code',
    	'cat_max_student',
    	'cat_status',
    	'org_no',
        'cat_cover_image'
    ];

    public function instructors()
    {
        // belongsTo(RelatedModel, foreignKey = roles_id, keyOnRelatedModel = id)
        return $this->belongsToMany(Instructor::class, 'classes_instructors', 'cat_no', 'instr_no','cat_id', 'instr_id');
    }
    /**
     * Category has many .
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function quizzes()
    {
        // hasMany(RelatedModel, foreignKeyOnRelatedModel = category_id, localKey = id)
        return $this->hasManyThrough(Quiz::class, Course::class, 'cat_no', 'course_no','cat_id','course_id');
    }
}
