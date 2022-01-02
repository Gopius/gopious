<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LearnerPollOption extends Model
{
    use HasFactory;

     protected $fillable = [
    	'poll_option_no',
    	'learner_no',
    	
    ];
}
