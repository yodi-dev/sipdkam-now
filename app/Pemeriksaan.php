<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemeriksaan extends Model
{
    use HasFactory;

    protected $fillable = ['sis', 'dias', 'bb', 'keluhan', 'diagnosis_utama', 'diagnosis_tambahan', 'icd', 'gds', 'au', 'choi'];

    public function kunjungans()
    {
        return $this->hasOne(Kunjungan::class);
    }
}
