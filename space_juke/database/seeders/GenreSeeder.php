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
        $seedGenres = [
            [
                'id'=>1,
                'name'=>'Rock',
                'parent'=> null,
                'icon'=>'017-rock-guitar.png',
            ],
            [
                'id'=>2,
                'name'=>'Alternative',
                'parent'=> 1,
                'icon'=>'001-flash.png',
            ],
            [
                'id'=>3,
                'name'=>'World',
                'parent'=>null,
                'icon'=>'022-world.png',
            ],
            [
                'id'=>4,
                'name'=>'Karaoke',
                'parent'=>3,
                'icon'=>'009-karaoke.png',
            ],
            [
                'id'=>5,
                'name'=>'Pop',
                'parent'=>null,
                'icon'=>'015-pop.png',
            ],
            [
                'id'=>6,
                'name'=>'Easy Listening',
                'parent'=>null,
                'icon'=>'018-hat.png',
            ],
            [
                'id'=>7,
                'name'=>'Metal',
                'parent'=>1,
                'icon'=>'002-metal.png',
            ],
            [
                'id'=>8,
                'name'=>'Latin',
                'parent'=>3,
                'icon'=>'011-latin.png',
            ],
            [
                'id'=>9,
                'name'=>'Children\'s',
                'parent'=>6,
                'icon'=>'010-kids.png',
            ],
            [
                'id'=>10,
                'name'=>'Supergroups',
                'parent'=>1,
                'icon'=>'021-trendy.png',
            ],
            [
                'id'=>11,
                'name'=>'Chill-out',
                'parent'=>6,
                'icon'=>'005-focus.png',
            ],
            [
                'id'=>12,
                'name'=>'Study',
                'parent'=>6,
                'icon'=>'020-study.png',
            ],
            [
                'id'=>13,
                'name'=>'Relaxation',
                'parent'=>6,
                'icon'=>'019-sleep.png',
            ],
            [
                'id'=>14,
                'name'=>'Choral',
                'parent'=>6,
                'icon'=>'006-user.png',
            ],
            [
                'id'=>15,
                'name'=>'Various',
                'parent'=>5,
                'icon'=>'014-party.png',
            ],
            [
                'id'=>16,
                'name'=>'Love',
                'parent'=>6,
                'icon'=>'013-love.png',
            ],
            [
                'id'=>17,
                'name'=>'Electronica',
                'parent'=>5,
                'icon'=>'004-edm.png',
            ],
            [
                'id'=>18,
                'name'=>'Dubstep',
                'parent'=>17,
                'icon'=>'008-boom-box.png',
            ],
            [
                'id'=>19,
                'name'=>'Funk',
                'parent'=>5,
                'icon'=>'007-funk.png',
            ],
            [
                'id'=>20,
                'name'=>'Wedding',
                'parent'=>6,
                'icon'=>'003-wedding-dinner.png',
            ],
            [
                'id'=>21,
                'name'=>'Elevator',
                'parent'=> 17,
                'icon'=>'012-amplify.png',
            ],
            [
                'id'=>22,
                'name'=>'Folk',
                'parent'=>null,
                'icon'=>'016-genre.png',
            ],

        ];

        foreach ($seedGenres as $genre){
            Genre::create($genre);
        }
    }
}
