<?php

namespace App\Imports;

use App\Jadwal;
use Maatwebsite\Excel\Concerns\ToModel;

class JadwalsImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Jadwal([
            'tanggal'     => $row[1],
            'bagian'    => $row[2],
            'shift' => $row[3],
            'nama' => $row[4],
        ]);
    }
}
