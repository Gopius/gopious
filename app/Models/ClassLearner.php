<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassLearner extends Model
{
    use HasFactory;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'classes_learners';

    protected $fillable = [
        'cat_no',
        'learner_no',
    ];

    public function class()
    {
        // belongsTo(RelatedModel, foreignKey = class_id, keyOnRelatedModel = id)
        return $this->belongsTo(Category::class, 'cat_no', 'cat_id');
    }
    public function instructor()
    {
        // belongsTo(RelatedModel, foreignKey = class_id, keyOnRelatedModel = id)
        return $this->belongsTo(Learner::class, 'learner_no', 'learner_id');
    }

    public function learner()
    {
        // belongsTo(RelatedModel, foreignKey = class_id, keyOnRelatedModel = id)
        return $this->belongsTo(Learner::class, 'learner_no', 'learner_id');
    }
}
