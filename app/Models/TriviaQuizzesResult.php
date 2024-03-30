<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TriviaQuizzesResult extends Model
{
    protected $table = 'trivia_quiz_results';
    protected $guarded = ['id'];
    use HasFactory;
}
