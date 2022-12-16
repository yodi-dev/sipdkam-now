<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rekam extends Model
{
    use HasFactory;
    protected $fillable = ['no_rm', 'no_bpjs', 'prolanis', 'nama', 'kelamin', 'tgl_lahir', 'dusun', 'rt', 'rw', 'desa', 'kecamatan', 'kota_kab', 'no_telp', 'pemilik_no_telp', 'ppk_umum', 'jenis_peserta_bpjs', 'tgl_mutasi_bpjs', 'no_kk'];
    // protected $guarded = 'id';

    public function kunjungans()
    {
        return $this->hasMany(Kunjungan::class);
    }
}
