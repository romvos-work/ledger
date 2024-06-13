<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeederCurrency extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('currency')->insert([
            ['id' => 1, 'name' => 'dollarUS'],
            ['id' => 2, 'name' => 'rublePmr'],
            ['id' => 3, 'name' => 'rubleRF'],
            ['id' => 4, 'name' => 'euro'],
            ['id' => 5, 'name' => 'leiMD'],
        ]);
    }
}
