<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassInstructor extends Model
{
    use HasFactory;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'classes_instructors';

    /**
     * Fields that can be mass assigned.
     *
     * @var array
     */
    protected $fillable = [
    	'cat_no',
    	'instr_no',
    ];	

    /**
     * ClassInstructor belongs to Class.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function class()
    {
        // belongsTo(RelatedModel, foreignKey = class_id, keyOnRelatedModel = id)
        return $this->belongsTo(Category::class, 'cat_no', 'cat_id');
    }
    public function instructor()
    {
        // belongsTo(RelatedModel, foreignKey = class_id, keyOnRelatedModel = id)
        return $this->belongsTo(Instructor::class, 'instr_no', 'instr_id');
    }
}
