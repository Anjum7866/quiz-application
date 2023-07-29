<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description',  'subject_id',  'content', 'video_path', 'audio_path', 'file_path'];

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

}
