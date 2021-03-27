<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('models')->truncate();

        $filename = 'database/seeders/data/tags.json';
        $content = json_decode(File::get($filename), true);
        Tag::insert($content);
    }
}
