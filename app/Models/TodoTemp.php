<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TodoTemp extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'domain_id',
        'catatan',
        'status',
        'subject',
        'todoFrom'
    ];

    public function domains()
    {
        return $this->belongsTo(Domain::class, 'domain_id');
    }
    public function from()
    {
        return $this->belongsTo(User::class, 'todoFrom');
    }
}
