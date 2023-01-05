<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tindakan extends Model
{
    use HasFactory;

    protected $fillable = ['nama_tindakan', 'operator', 'asisten'];

    public function kunjungans()
    {
        return $this->hasOne(Kunjungan::class);
    }
}
