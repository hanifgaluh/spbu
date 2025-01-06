<?php

namespace Database\Seeders;

use App\Models\User;
use App\Http\Controllers\BbmController;
use App\Models\Bbm;
use App\Models\Supp;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();


        Bbm::create([
            'nm_bbm' => 'pertalite',
            'hrg_jual' => 10000,
            'hrg_beli' => 8000,
            'ltr_bbm' => 150
        ]);

        Bbm::create([
            'nm_bbm' => 'pertamax',
            'hrg_jual' => 13000,
            'hrg_beli' => 10000,
            'ltr_bbm' => 150
        ]);

        Bbm::create([
            'nm_bbm' => 'oli motor matic',
            'hrg_jual' => 35000,
            'hrg_beli' => 30000,
            'ltr_bbm' => 150
        ]);

        Supp::create([
            'nm_supp' => 'PT. ABC',
            'hrg_beli' => '30000',
            'jml_bbm' => 10,
            'jns_bbm' => 'oli motor matic',
            'hrg_total' => 300000
        ]);

        Supp::create([
            'nm_supp' => 'PT. DEF',
            'hrg_beli' => 80000,
            'jml_bbm' => 10,
            'jns_bbm' => 'pertalite',
            'hrg_total' => 800000
        ]);

        Supp::create([
            'nm_supp' => 'PT. GHI',
            'hrg_beli' => 100000,
            'jml_bbm' => 10,
            'jns_bbm' => 'pertamax',
            'hrg_total' => 1000000
        ]);
        
    }
}
