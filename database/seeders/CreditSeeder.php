<?php

namespace Database\Seeders;

use App\Models\Credit;
use Illuminate\Database\Seeder;

class CreditSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'game_id' => 1,
                'price' => 15000,
                'information' => 'DIAMOND - 40',
            ],
            [
                'game_id' => 2,
                'price' => 20500,
                'information' => 'DIAMOND - 60',
            ],
            [
                'game_id' => 3,
                'price' => 60000,
                'information' => 'DIAMOND - 100',
            ]
        ];

        foreach($data as $row){
            Credit::create([
                'game_id' => $row['game_id'],
                'price' => $row['price'],
                'information' => $row['information'],
            ]);
        }
    }
}
