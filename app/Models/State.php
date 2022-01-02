<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class state extends Model
{
    use HasFactory;

    /**
     * State belongs to Country.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function country()
    {
    	// belongsTo(RelatedModel, foreignKey = country_id, keyOnRelatedModel = id)
    	return $this->belongsTo(Country::class);
    }
}
