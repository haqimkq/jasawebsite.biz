<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WaNumber extends Model
{
    use HasFactory;
    protected $table = 'wa_numbers';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'number',
    ];
    public function whatsapp()
    {
        return $this->belongsTo(Whatsapp::class);
    }
}
