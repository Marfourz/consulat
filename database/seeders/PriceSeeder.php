<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class PriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('global_infos')->insert([
          'price_visa' => 1200,
          'price_carte_consulaire' => 2000,
          'price_laissez_passer' => 3000
        ]);
    }
}
