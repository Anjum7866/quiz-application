<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizHistory extends Model
{
    use HasFactory;
    protected $table = 'quiz_histories';

    protected $fillable = [
        'quiz_name',
        'score', 
        'answered_at',
    ];
    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }


}
