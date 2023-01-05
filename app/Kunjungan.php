<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kunjungan extends Model
{
    use HasFactory;

    // protected $guarded = 'id';
    protected $fillable = ['shift', 'jaminan', 'poli', 'rekam_id', 'dokter_id', 'pemeriksaan_id', 'tindakan_id', 'biaya_id'];

    public function rekams()
    {
        return $this->belongsTo(Rekam::class);
    }

    public function pemeriksaans()
    {
        return $this->belongsTo(Pemeriksaan::class);
    }

    public function tindakans()
    {
        return $this->belongsTo(Tindakan::class);
    }
}
