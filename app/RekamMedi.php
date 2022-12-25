<?php

namespace App;

use App\Kunjungan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RekamMedi extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    // protected $table = "rekam_medises";

    public function kunjungans()
    {
        return $this->hasmany(Kunjungan::class);
    }
}
