<?php

namespace Database\Seeders;

use App\Models\User;
use App\Http\Controllers\BbmController;
use App\Models\Bbm;
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

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        Bbm::create([
            'nm_bbm' => 'pertalite',
            'hrg_jual' => 10000
        ]);

        Bbm::create([
            'nm_bbm' => 'pertamax',
            'hrg_jual' => 13000
        ]);

        Bbm::create([
            'nm_bbm' => 'oli motor matic',
            'hrg_jual' => 35000
        ]);
    }
}
