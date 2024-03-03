<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function scopeActive($query){
        return $query->where('active', true);
    }

    public function scopeDescending($query){
        return $query->orderBy('created_at', 'desc');
    }
}
