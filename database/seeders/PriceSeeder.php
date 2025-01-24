<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;
use App\Models\Price;
use App\Models\Nationality;

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


        $nationality_benin = Nationality::where('name', 'Bénin')->first();
        $nationality_ivoir = Nationality::where('name', 'Côte d\'Ivoire')->first();
  
        Price::create([
            'nationality_id' => $nationality_benin->id,
            'document_type' => 'visa',
            'price' => 50.00
        ]);
  
        Price::create([
            'nationality_id' => $nationality_benin->id,
            'document_type' => 'carteConsulaire',
            'price' => 75.00
        ]);
  
        Price::create([
            'nationality_id' => $nationality_benin->id,
            'document_type' => 'laissezPasser',
            'price' => 30.00
        ]);
  
        Price::create([
            'nationality_id' => $nationality_ivoir->id,
            'document_type' => 'visa',
            'price' => 60.00
        ]);
  
        Price::create([
            'nationality_id' => $nationality_ivoir->id,
            'document_type' => 'carteConsulaire',
            'price' => 85.00
        ]);
  
        Price::create([
            'nationality_id' => $nationality_ivoir->id,
            'document_type' => 'laissezPasser',
            'price' => 40.00
        ]);
  
    }
}
