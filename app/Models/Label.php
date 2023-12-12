<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Label extends Model
{
    use HasFactory;
    protected $table = 'labels';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'name',
        'color',
    ];
    public function pelanggan()
    {
        return $this->belongsToMany(Pelanggan::class);
    }
    public function todo()
    {
        return $this->belongsToMany(Todo::class);
    }
}
