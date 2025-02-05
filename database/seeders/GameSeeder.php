<?php

namespace Database\Seeders;

use App\Models\Game;
// use Faker\Core\File;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $jsonFile = base_path('database/data/data.json');
        $jsonData = json_decode(File::get($jsonFile), true);
        Game::insert($jsonData);
    }
}
