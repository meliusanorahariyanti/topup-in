<?php

namespace Database\Seeders;

use App\Models\GameType;
use Illuminate\Database\Seeder;

class GameTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => 'PC Game'],
            ['name' => 'Mobile Game'],
            ['name' => 'Console Game'],
            ['name' => 'Handheld Games'],
        ];

        foreach($data as $row){
            GameType::create([
                'name' => $row['name']
            ]);
        }
    }
}
