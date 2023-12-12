<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoicePelanggan extends Model
{
    use HasFactory;
    protected $table = 'invoice_pelanggans';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'file',
        'nomor_invoice',
        'due_date',
        'bill_date',
        'nama_penerima',
        'nama_perusahaan',
    ];

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'id_pelanggan');
    }
    public function item()
    {
        return $this->hasMany(ItemInvoicePelanggan::class);
    }
}
