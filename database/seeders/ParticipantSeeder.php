<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Participant;

class ParticipantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $namas = ['Magenta Burhan', 'kipli Warman', 'Agus Darman'];

        foreach ($namas as $nama) {
            Participant::create([
                'id' => Str::uuid(),
                'nama' => $nama,
                'pin' => null,
            ]);
        }
    }
}
