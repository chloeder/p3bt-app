<?php

namespace Database\Seeders;

use App\Models\DesaBukuTanah;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DesaBukuTanahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $desaBT = [
            'Biga', 'Upai', 'Genggulang', 'Pontodon', 'Bilalang I', 'Bilalang II', 'Sia', 'Pontodon Timur',
            'Kotobangon', 'Tumobui', 'Sinindian', 'Matali', 'Motoboi Besar', 'Kobo Kecil', 'Kobo Besar', 'Moyag', 'Moyag Todulan', 'Moyag Tampoan', 'Motoboi Kecil', 'Mongondow', 'Pobundayan',
            'Poyowa Besar I', 'Poyowa Besar II', 'Tabang', 'Bungko', 'Kopandakan', 'Poyowa Kecil', 'Kotamobagu', 'Gogagoman', 'Mogolaing', 'Molinow', 'Mongkonai', 'Mongkonai Barat',
        ];

        foreach ($desaBT as $s) {
            DesaBukuTanah::create([
                'nama' => $s,
            ]);
        }
    }
}
