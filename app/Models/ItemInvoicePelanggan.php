<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemInvoicePelanggan extends Model
{
    use HasFactory;
    protected $table = 'item_invoice_pelanggans';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'name',
        'quantity',
        'harga',
        'pelanggan_id',
    ];
    public function invoice_pelanggan()
    {
        return $this->belongsTo(InvoicePelanggan::class);
    }
}
