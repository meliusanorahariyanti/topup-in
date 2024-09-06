<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $data = [
            ['name' => 'Action Game'],
            ['name' => 'Fighting Game'],
            ['name' => 'First Person Shooter (FPS)'],
            ['name' => 'Third Person Shooter (TPS)'],
            ['name' => 'Real Time Strategy (RTS)'],
            ['name' => 'Role Playing Game (RPG)'],
            ['name' => 'Adventure'],
            ['name' => 'Simulasi'],
            ['name' => 'Sport Game'],
            ['name' => 'Racing Game'],
            ['name' => 'Multiplayer Game'],
        ];

        foreach($data as $row){
            Genre::create([
                'name' => $row['name']
            ]);
        }
    }
}
