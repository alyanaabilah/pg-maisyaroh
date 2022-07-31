<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\courier;

class CouriersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['code' => 'jne', 'title' => 'JNE'],
            ['code' => 'pos', 'title' => 'POS'],
            ['code' => 'tiki', 'title' => 'TIKI']
        ];
        courier::insert($data);
    }
}
