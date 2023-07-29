<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;
    protected $guarded = ['id','title','description', 'subject_id', 'topic_id', 'created_at', 'updated_at'];

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }
    public function questions() {
        return $this->hasMany(Question::class);
    }


}
