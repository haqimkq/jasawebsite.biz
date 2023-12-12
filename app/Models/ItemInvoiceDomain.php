<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemInvoiceDomain extends Model
{
    use HasFactory;
    protected $table = 'item_invoice_domains';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'keterangan',
        'tanggal_awal',
        'tanggal_akhir',
        'quantity',
        'harga',
        'invoice_domain_id',
    ];
    public function invoice_domain()
    {
        return $this->belongsTo(InvoiceDomain::class);
    }
}
