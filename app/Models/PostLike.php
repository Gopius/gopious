<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostLike extends Model
{
    use HasFactory;
    protected $fillable = [
    	'post_no',
    	'instr_no',
    	'learner_no',
    	
    ];
}
