<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class Learner extends Authenticatable
{
    use HasFactory, SoftDeletes;
    protected $primaryKey = "learner_id";

    protected $fillable = [
        'learner_name',
        'learner_email',
        'learner_phone',
        'learner_avatar_url',
        'org_no',
        'open_password',
        'password',

    ];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }


    public function organization()
    {
        // belongsTo(RelatedModel, foreignKey = organization_id, keyOnRelatedModel = id)
        return $this->belongsTo(Organization::class, 'org_no', 'org_id');
    }

    /**
     * Instructor has many Classes.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function classes()
    {
        // hasMany(RelatedModel, foreignKeyOnRelatedModel = instructor_id, localKey = id)
        return $this->belongsToMany(Category::class, 'classes_learners', 'learner_no', 'cat_no', 'learner_id', 'cat_id');
    }

    public function verifications()
    {
        // hasMany(RelatedModel, foreignKeyOnRelatedModel = admin_id, localKey = id)
        return $this->hasMany(VerificationToken::class, 'learner_no', 'learner_id');
    }
}
