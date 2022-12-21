<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailKunjungan extends Model
{
    use HasFactory;

    protected $guarded = 'id';

    public function kunjungans()
    {
        return $this->hasOne(Kunjungan::class);
    }
}
