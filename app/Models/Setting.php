<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    /**
     * Fields that can be mass assigned.
     *
     * @var array
     */
    protected $fillable = [
    	'theme',
    	'color',
    	'css',
    	'js',
    	'domain_name',
    	'org_no',
    ];

    /**
     * Setting belongs to Organization.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function organization()
    {
        // belongsTo(RelatedModel, foreignKey = organization_id, keyOnRelatedModel = id)
        return $this->belongsTo(Organization::class, 'org_no', 'org_id');
    }
}
