<?php

namespace Database\Seeders;

use App\Models\JenisBukuTanah;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JenisBukuTanahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jenisBT = [
            'Hak Milik',
            'Hak Guna Bangunan',
            'Hak Pakai',
        ];

        foreach ($jenisBT as $s) {
            JenisBukuTanah::create([
                'nama' => $s,
            ]);
        }
    }
}
