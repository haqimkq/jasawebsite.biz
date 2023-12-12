<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Pelanggan extends Model
{
    use HasFactory;
    protected $table = 'pelanggans';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'nama_pelanggan',
        'alamat',
        'no_hp',
        'keterangan_pelanggan',
        'link_history',
        'user_id',
        'image',
        'label_id',
        'status'
    ];



    public function domain()
    {
        return $this->hasMany(Domain::class);
    }
    public function invoice_pelanggan()
    {
        return $this->hasMany(InvoicePelanggan::class, 'id_pelanggan');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function label()
    {
        return $this->belongsToMany(Label::class);
    }
}
