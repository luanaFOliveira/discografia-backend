<?php

namespace Database\Seeders;

use App\Models\Album;
use App\Models\Track;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AlbumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Album::factory(10)->create()->each(function ($album){
           $tracks = Track::factory(5)->create(['album_id' => $album->id]);
           $album->tracks()->saveMany($tracks);
        });
    }
}
