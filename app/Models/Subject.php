<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    // use HasFactory;

    protected $fillable = [
        'name', 'detail'
    ];
    public function topics()
    {
        return $this->hasMany(Topic::class);
    }

}
