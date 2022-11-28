<?php

namespace App;

use App\Kunjungan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RekamMedis extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function kunjungans()
    {
        return $this->hasmany(Kunjungan::class);
    }
}
