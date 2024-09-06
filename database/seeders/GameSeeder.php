<?php

namespace Database\Seeders;

use App\Models\Game;
use Illuminate\Database\Seeder;

class GameSeeder extends Seeder
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
                'genre_id' => 1,
                'game_type_id' => 1,
                'name' => 'Valorant',
                'description' => 'Valorant adalah game first-person shooter yang sangat populer dengan gameplay taktis dan grafis yang memukau. Bergabunglah dalam pertempuran strategis dan tunjukkan keterampilanmu.',
                'photo' => 'valorant.jpg',
            ],
            [
                'genre_id' => 4,
                'game_type_id' => 2,
                'name' => 'Mobile Legends',
                'description' => 'Mobile Legends adalah game multiplayer online battle arena (MOBA) yang menawarkan pertarungan tim yang seru dan peta yang strategis. Pilih hero favoritmu dan buktikan keahlianmu.',
                'photo' => 'mobile_legends.jpg',
            ],
            [
                'genre_id' => 3,
                'game_type_id' => 2,
                'name' => 'Arena of Valor',
                'description' => 'Arena of Valor adalah game MOBA yang sangat menarik dengan grafis yang menawan dan sistem permainan yang seru. Bertarunglah dengan temanmu dan jadilah yang terbaik.',
                'photo' => 'aov.jpg',
            ],
            [
                'genre_id' => 3,
                'game_type_id' => 2,
                'name' => 'Super Sus',
                'description' => 'Super Sus adalah game sosial deduksi yang menguji keahlianmu dalam menemukan impostor di antara temanmu. Temukan siapa yang berbohong dan jadilah pemenangnya.',
                'photo' => 'super_sus.png',
            ],
            [
                'genre_id' => 3,
                'game_type_id' => 2,
                'name' => 'Get Rich',
                'description' => 'Get Rich adalah game strategi ekonomi yang menantang kamu untuk membangun kekayaan dan mencapai tujuan bisnis. Rencanakan dan buat keputusan yang cerdas untuk meraih kesuksesan.',
                'photo' => 'get_rich.jpg',
            ],
            [
                'genre_id' => 2,
                'game_type_id' => 1,
                'name' => 'PUBG Mobile',
                'description' => 'PUBG Mobile adalah game battle royale yang menawarkan pengalaman bertahan hidup yang intens. Bertempurlah dengan 100 pemain lain dan jadilah yang terakhir bertahan.',
                'photo' => 'pubg_mobile.jpg',
            ],
            [
                'genre_id' => 1,
                'game_type_id' => 2,
                'name' => 'CS:GO',
                'description' => 'Counter-Strike: Global Offensive (CS:GO) adalah game first-person shooter yang sangat kompetitif dengan mode permainan yang bervariasi. Bergabunglah dalam pertempuran taktis dan kalahkan lawanmu.',
                'photo' => 'csgo.jpg',
            ],
        ];

        foreach($data as $row){
            Game::create([
                'genre_id' => $row['genre_id'],
                'game_type_id' => $row['game_type_id'],
                'name' => $row['name'],
                'description' => $row['description'],
                'photo' => $row['photo'],
            ]);
        }
    }
}
