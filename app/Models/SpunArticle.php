<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpunArticle extends Model
{
    use HasFactory;
    protected $table = 'spun_articles';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'spun_article',
        'spun_title',
    ];
    public function spunArticles()
    {
        return $this->belongsTo(Article::class);
    }
}
