<?php

namespace Database\Seeders;

use App\Models\Playlist;
use Illuminate\Database\Seeder;

class PlaylistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seedPlaylist = [
            [
                'id' => 1,
                'name' => 'Work',
                'user_id' => 1,
                'public' => true,
                'genre_id'=> 2,
                'tracks' => [1,2,3,4,5],
            ], [
                'id' => 2,
                'name' => 'Sleep',
                'user_id' => 1,
                'public' => true,
                'genre_id'=> 3,
                'tracks' => [6,7,8],
            ], [
                'id' => 3,
                'name' => 'Metal',
                'user_id' => 2,
                'public' => false,
                'tracks' => [2,10,9,4],
            ],
            [
                'id' => 4,
                'name' => 'Need my space',
                'user_id' => 4,
                'public' => false,
                'tracks' => [1,4,6],
            ],
            [
                'id' => 5,
                'name' => 'New Playlist',
                'user_id' => 5,
                'public' => true,
                'tracks' => [1,6],
            ],
        ];

        foreach ($seedPlaylist as $seed) {

            $newPlaylistData = [
                'id'=>$seed['id'],
                'name'=>$seed['name'],
                'public'=>$seed['public'],
                'user_id'=>$seed['user_id'],
                ];

            $newTrackList = Playlist::create($newPlaylistData);

            $tracks =$seed['tracks'];
            $newTrackList->tracks()->attach($tracks);
        }
    }
}
