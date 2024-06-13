<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeederProduct extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('product')->insert([
            ['name' => 'Вода Малыш', 'measureType' => 'unit', 'measureSuffix' => 'шт', 'unitWeight' => 1500],
            ['name' => 'Ветчина Деликатесная', 'measureType' => 'weight', 'measureSuffix' => 'гр', 'unitWeight' => null],
            ['name' => 'Конфеты Пламя Костра', 'measureType' => 'weight', 'measureSuffix' => 'гр', 'unitWeight' => null],
            ['name' => 'Шоколад Милка Пузырьки', 'measureType' => 'unit', 'measureSuffix' => 'гр', 'unitWeight' => 90],
            ['name' => 'Шоколад Озера Орех', 'measureType' => 'unit', 'measureSuffix' => 'гр', 'unitWeight' => 90],
        ]);
    }
}
