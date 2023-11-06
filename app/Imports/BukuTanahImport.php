<?php

namespace App\Imports;

use App\Models\BukuTanah;
use App\Models\DesaBukuTanah;
use App\Models\JenisBukuTanah;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class BukuTanahImport implements ToCollection
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            $jenisBT = JenisBukuTanah::where('nama', $row[2])->first();

            $desaBT = DesaBukuTanah::where('nama', $row[1])->first();

            BukuTanah::create([
                'nomor_hak' => $row[0],
                'desa_id' => $desaBT['id'] ?? null,
                'jenis_hak_id' => $jenisBT['id'],
            ]);
        }
    }
}
