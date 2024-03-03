<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    // kolom yg bisa di isi
    public $fillable = [
        'title',
        'content',
    ];

    public static function boot(){
        //memanggil boot diparent classnya
        parent::boot();

        //event ketika post dibuat
        static::creating(function ($post) {
            //apa yg akan dilakukan ketika post dibuat / sblm dimasukkan db
            $post->slug = str_replace(' ', '-', $post->title); //spasi direplace dengan - dan yg dibaca adalah title
        });
    }

    //func untuk nampil yg aktif
    public function scopeActive($query){
        return $query->where('active', true);
    }

    //fnctn untuk descending
    public function scopeDescending($query){
        return $query->orderBy('created_at', 'desc');
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }


}
