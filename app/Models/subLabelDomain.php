<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subLabelDomain extends Model
{
    use HasFactory;
    protected $table = 'sub_label_domains';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'name',
        'color',
    ];

    public function label()
    {
        return $this->belongsToMany(LabelDomain::class, 'label_domain_sub_label_domain', 'sub_label_domain_id', 'label_domain_id');
    }
}
