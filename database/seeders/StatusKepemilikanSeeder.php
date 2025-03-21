<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class StatusKepemilikanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('status_kepemilikan')->insert([
            ['id' => 'SK-00001', 'nama_status_kepemilikan' => 'Milik Pemerintah'],
            ['id' => 'SK-00002', 'nama_status_kepemilikan' => 'Milik Perorangan'],
            ['id' => 'SK-00003', 'nama_status_kepemilikan' => 'Milik Kalurahan'],
            ['id' => 'SK-00004', 'nama_status_kepemilikan' => 'Milik Sultan'],
        ]);
    }
}
