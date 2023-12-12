<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceDomain extends Model
{
    use HasFactory;
    protected $table = 'invoice_domains';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'file',
        'nomor_invoice',
        'due_date',
        'bill_date',
        'nama_penerima',
        'nama_perusahaan',
        'nama_domain',
    ];
    public function domain()
    {
        return $this->belongsTo(Domain::class, 'id_domain');
    }
    public function item()
    {
        return $this->hasMany(ItemInvoiceDomain::class);
    }
}
