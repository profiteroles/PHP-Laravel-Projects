<?php

namespace Database\Seeders;

use App\Models\Track;
use Illuminate\Database\Seeder;

class TrackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seedTracks = [
            [
                'id' => 1,
                'artist' => 'Jean Michel Jarre',
                'album' => 'Oxygène',
                'genre_id' => 17,
                'name' => 'Oxygène (Part I)',
                'length' => '07:39',
                'year' => 1977,
            ],[
                'id' => 2,
                'artist' => 'AllttA',
                'album' => 'Facing Giants',
                'genre_id' => 5,
                'name' => 'More Better  (fg. II) feat. 20syl & Mr. J Medeiros',
                'length' => '02:57',
                'year' => 2017,
            ],[
                'id' => 3,
                'artist' => 'Tangerine Dream',
                'album' => 'Rubycon',
                'genre_id' => 17,
                'name' => 'Rubycon (Part I)',
                'length' => '17:19',
                'year' => 1975,
            ],[
                'id' => 4,
                'artist' => 'Zutomayo',
                'album' => 'Gusare',
                'genre_id' => 22,
                'name' => 'Hunch Gray',
                'length' => '04:10',
                'year' => 2021,
            ],[
                'id' => 5,
                'artist' => 'Apocalyptica',
                'album' => 'Inquisition Symphony',
                'genre_id' => 7,
                'name' => 'Inquisition Symphony',
                'length' => '04:59',
                'year' => 1998,
            ],[
                'id' => 6,
                'artist' => 'Beck',
                'album' => 'Midnight Vultures',
                'genre_id' => 5,
                'name' => 'Nicotine & Gravy',
                'length' => '05:13',
                'year' => 1999,
            ],[
                'id' => 7,
                'artist' => 'Beck',
                'album' => 'Midnight Vultures',
                'genre_id' => 5,
                'name' => 'Mixed Bizness',
                'length' => '04:10',
                'year' => 1999,
            ],[
                'id' => 8,
                'artist' => 'Zutomayo',
                'album' => 'Gusare',
                'genre_id' =>22,
                'name' => 'Can\'t Be Right',
                'length' => '04:01',
                'year' => 2021,
            ],[
                'id' => 9,
                'artist' => 'Bryan Adams',
                'album' => 'Unplugged',
                'genre_id' => 1,
                'name' => '18 til I die',
                'length' => '03:31',
                'year' => 1997,
            ],[
                'id' => 10,
                'artist' => 'Bryan Adams',
                'album' => 'Unplugged',
                'genre_id' => 1,
                'name' => 'Heaven',
                'length' => '04:31',
                'year' => 1997,
            ],
        ];

        foreach ($seedTracks as $seed){
            Track::create($seed);
        }
    }
}
