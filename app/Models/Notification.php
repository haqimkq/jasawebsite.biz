<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'isRead',
        'nameserver',
        'notif_pelanggan',
        'isAdmin'
    ];
    public function domain()
    {
        return $this->belongsTo(Domain::class);
    }
    public function pelanggan()
    {
        return $this->belongsTo(pelanggan::class);
    }
}
