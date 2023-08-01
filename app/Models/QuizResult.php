<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizResult extends Model
{
    use HasFactory;
    protected $table = 'quiz_results';

    protected $fillable = [
        'user_id',
        'quiz_id',
        'score', 
        'answered_at'
    ];
    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
