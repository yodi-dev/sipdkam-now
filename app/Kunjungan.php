<?php

namespace App;

use App\RekamMedis;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kunjungan extends Model
{
    use HasFactory;

    public function rekam_medis()
    {
        return $this->belongsTo(RekamMedis::class);
    }
}
