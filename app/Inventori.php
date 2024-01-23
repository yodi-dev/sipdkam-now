<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventori extends Model
{
    use HasFactory;

    protected $fillable = ['nama_item', 'generik', 'satuan', 'satuan', 'stok', 'expired_date', 'locater'];
}
