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
            'tanggal' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[0]),
            'bagian' => $row[1],
            'shift' => $row[2],
            'nama' => $row[3],
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
