<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Laravel\Scout\Searchable;

class Domain extends Model
{
    use HasFactory;
    protected $table = 'domains';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'nama_domain',
        'epp_code',
        'keterangan_domain',
        'tanggal_mulai',
        'tanggal_expired',
        'hosting',
        'kapasitas_hosting',
        'tanggal_hosting',
        'lokasi_hosting',
        'paket_website',
        'jumlah_email',
        'pelanggan_id',
        'nameserver_id',
        'slug',
        'label_domain_id',
        'hidden_epp',
        'loginUrl',
        'loginUsername',
        'loginPassword',
        'perpanjangan',
        'onlyHosting',
        'link_history',
        'vendor',
        'status',
        'externalDomain'
    ];
    use Searchable;
    public function toSearchableArray(): array
    {
        return [
            'nama_domain' => $this->nama_domain,
        ];
    }

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class);
    }
    public function nameserver()
    {
        return $this->belongsTo(Nameserver::class);
    }
    public function label()
    {
        return $this->belongsToMany(LabelDomain::class);
    }
    public function notification()
    {
        return $this->hasMany(Notification::class);
    }
    public function invoice_domain()
    {
        return $this->hasMany(InvoiceDomain::class);
    }
    public function todos()
    {
        return $this->belongsToMany(Todo::class, 'domain_todo', 'domain_id', 'todo_id');
    }
    public function cronjobs()
    {
        return $this->belongsToMany(Cronjob::class, 'cronjob_domain', 'domain_id', 'domain_id');
    }
    public function subLabel()
    {
        return $this->belongsToMany(subLabelDomain::class, 'domain_label_domain')->withPivot('label_domain_id');
    }
}
