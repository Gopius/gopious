<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VerificationToken extends Model
{
    use HasFactory;

    protected $fillable = [
        'org_no',
        'admin_no',
        'instr_no',
        'learner_no',
        'token',
    ];

    /**
     * VerificationToken belongs to Instructor.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function instructor()
    {
        // belongsTo(RelatedModel, foreignKey = instructor_id, keyOnRelatedModel = id)
        return $this->belongsTo(Instructor::class, 'instr_no', 'instr_id');
    }

    /**
     * VerificationToken belongs to Organization.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function organization()
    {
        // belongsTo(RelatedModel, foreignKey = organization_id, keyOnRelatedModel = id)
        return $this->belongsTo(Organization::class, 'org_no', 'org_id');
    }

    /**
     * VerificationToken belongs to Learner.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function learner()
    {
        // belongsTo(RelatedModel, foreignKey = learner_id, keyOnRelatedModel = id)
        return $this->belongsTo(Learner::class,'learner_no', 'learner_id');
    }

    /**
     * VerificationToken belongs to Admin.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function admin()
    {
        // belongsTo(RelatedModel, foreignKey = admin_id, keyOnRelatedModel = id)
        return $this->belongsTo(Admin::class, 'admin_no', 'admin_id');
    }
}
