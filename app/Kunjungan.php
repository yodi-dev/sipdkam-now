<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kunjungan extends Model
{
    use HasFactory;

    protected $guarded = 'id';

    public function details()
    {
        return $this->belongsTo(DetailKunjungan::class);
    }

    public function rekams()
    {
        return $this->belongsTo(Rekam::class);
    }
}
