<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PivotLabelDomain extends Model
{
    use HasFactory;
    protected $table = 'domain_label_domain';
    protected $primaryKey = 'id';
    protected $fillable = [
        'keterangan',
        'sub_label_domain_id'
    ];
}
