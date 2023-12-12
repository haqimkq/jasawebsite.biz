<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemInvoice extends Model
{
    use HasFactory;
    protected $table = 'item_invoices';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'name',
        'quantity',
        'harga',
        'invoice_id',
    ];
    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }
}
