<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlockLearner extends Model
{
    use HasFactory;
    
    protected $fillable = [
    	'block_no',
    	'learner_no',
    ];
}
