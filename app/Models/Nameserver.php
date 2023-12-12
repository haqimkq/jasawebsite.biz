<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nameserver extends Model
{
    use HasFactory;
    protected $table = 'nameservers';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'nameserver1',
        'nameserver2',
        'tanggal_ns',
        'status_ns',
    ];
    public function domain()
    {
        return $this->hasMany(Domain::class);
    }
}
