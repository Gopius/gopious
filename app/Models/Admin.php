<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class Admin extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $primaryKey = "admin_id";

    /**
     * Fields that can be mass assigned.
     *
     * @var array
     */
    protected $fillable = [
        'email',
        'password',
        'name',
    ];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }


    /**
     * Admin has many Verifications.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function verifications()
    {
        // hasMany(RelatedModel, foreignKeyOnRelatedModel = admin_id, localKey = id)
        return $this->hasMany(VerificationToken::class, 'admin_no', 'admin_id');
    }

}

