<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'image_path', 'file_path', 'excel_sheet'];

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

}
