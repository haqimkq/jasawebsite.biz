<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cronjob extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'subject',
        'catatan',
        'date',
        'time'
    ];
    public function domains()
    {
        return $this->belongsToMany(Domain::class, 'cronjob_domain', 'cronjob_id', 'domain_id');
    }
    public function users()
    {
        return $this->belongsToMany(User::class, 'cronjob_user', 'cronjob_id', 'user_id');
    }
}
