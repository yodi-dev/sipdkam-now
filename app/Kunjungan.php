<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Kunjungan extends Model
{
    use HasFactory;

    // protected $guarded = 'id';
    protected $fillable = ['tanggal', 'shift', 'jaminan', 'poli', 'rekam_id', 'dokter_id', 'sis', 'dias', 'bb', 'keluhan', 'diagnosis_utama', 'diagnosis_tambahan', 'icd', 'gds', 'au', 'choi', 'nama_tindakan', 'operator', 'asisten', 'biaya_id'];

    public function rekams()
    {
        return $this->belongsTo(Rekam::class);
    }

    public function biayas()
    {
        return $this->belongsTo(Biaya::class);
    }

    public static function get_jadwal_dokter()
    {
        return DB::table('jadwals')
            ->select('nama')
            ->whereMonth('tanggal', bulan_angka())
            ->whereDay('tanggal', tanggal_now())
            ->where('bagian', 'dokter umum')
            ->get();
    }
}
