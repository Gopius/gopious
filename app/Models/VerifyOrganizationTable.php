<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VerifyOrganizationTable extends Model
{
    use HasFactory;

    protected $fillable = [
    	'org_no',
    	'token',
    ];

    /**
     * VerifyOrganizationTable belongs to Organization.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function organization()
    {
    	// belongsTo(RelatedModel, foreignKey = organization_id, keyOnRelatedModel = id)
    	return $this->belongsTo(Organization::class, 'org_no', 'org_id');
    }
}
