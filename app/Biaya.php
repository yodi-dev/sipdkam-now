<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biaya extends Model
{
    use HasFactory;

    // protected $primaryKey = 'biaya_id';
    public $incrementing = false;
    protected $fillable = ['id', 'adm', 'obat', 'tuslah', 'jasa_dokter', 'injeksi', 'jasa_tindakan', 'bahp', 'lab', 'pasang_infus', 'cairan_infus', 'akomodasi', 'jasa_perawat', 'diit', 'lain-lain', 'pembulat', 'total'];

    public function kunjungans()
    {
        return $this->hasOne(Kunjungan::class);
    }
}
