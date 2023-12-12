<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Youtube extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'link',
        'judul',
        'deskripsi',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_youtube', 'youtube_id', 'user_id');
    }
}
