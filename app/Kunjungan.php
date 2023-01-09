<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kunjungan extends Model
{
    use HasFactory;

    // protected $guarded = 'id';
    protected $fillable = ['shift', 'jaminan', 'poli', 'rekam_id', 'dokter_id', 'sis', 'dias', 'bb', 'keluhan', 'diagnosis_utama', 'diagnosis_tambahan', 'icd', 'gds', 'au', 'choi', 'nama_tindakan', 'operator', 'asisten', 'biaya_id'];

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
