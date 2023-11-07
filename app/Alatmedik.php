<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alatmedik extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'stok'];
}
