<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $table = 'articles';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'title',
        'article',
    ];
    public function spunArticles()
    {
        return $this->hasMany(SpunArticle::class, 'article_id');
    }
}
