<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeederShop extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('shop')->insert([
            ['id' => 1, 'name' => 'Супермаркет Шериф', 'currencyId' => 2],
            ['id' => 2, 'name' => 'Аптека Провизор', 'currencyId' => 2],
            ['id' => 3, 'name' => 'Рынок', 'currencyId' => 2],
            ['id' => 4, 'name' => 'Ресторан La Vida', 'currencyId' => 2],
            ['id' => 5, 'name' => 'Ресторан Love Sushi', 'currencyId' => 2],
        ]);
    }
}
