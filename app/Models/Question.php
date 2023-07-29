<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $guarded = ['id','text', 'subject_id', 'topic_id', 'created_at', 'updated_at'];


    public function subject(){
        return $this->belongsTo(Subject::class);
    }

    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }

    public function quiz() {
        return $this->belongsTo(Quiz::class);
    }

    public function options()
    {
        return $this->hasMany(Option::class);
    }

}
