<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LabelDomain extends Model
{
    use HasFactory;
    protected $table = 'label_domains';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'name',
        'color',
    ];
    public function domain()
    {
        return $this->belongsToMany(Domain::class, 'domain_label_domain', 'label_domain_id', 'domain_id')
            ->withPivot(['sub_label_domain_id', 'keterangan']);
    }
}
