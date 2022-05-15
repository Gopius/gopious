<?php

namespace App\Models;


use App\Models\Category;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class Instructor extends Authenticatable
{
    use HasFactory, SoftDeletes;
    protected $primaryKey = "instr_id";

    protected $fillable = [
        'instr_name',
        'instr_email',
        'instr_phone',
        'instr_avatar_url',
        'org_no',
        'password',
        'open_password',

    ];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

    /**
     * Instructor belongs to Organization.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
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
        return $this->belongsToMany(Category::class, 'classes_instructors', 'instr_no', 'cat_no', 'instr_id', 'cat_id');
    }

    public function verifications()
    {
        // hasMany(RelatedModel, foreignKeyOnRelatedModel = admin_id, localKey = id)
        return $this->hasMany(VerificationToken::class, 'instr_no', 'instr_id');
    }

    public function assignments()
    {
        return $this->hasMany(Assignment::class, 'instr_no', 'instr_id');
    }

    public function polls()
    {
        return $this->hasMany(Poll::class, 'instr_no', 'instr_id');
    }
}
