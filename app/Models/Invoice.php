<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $table = 'invoices';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'nama',
        'nomor_invoice',
        'file',
        'due_date',
        'bill_date',
        'nama_perusahaan'
    ];

    public function item()
    {
        return $this->hasMany(ItemInvoice::class);
    }
}
