<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('brands')->truncate();
        $filename = 'database/seeders/data/brands.json';
        $content = json_decode(File::get($filename), true);
        $data = [];
        foreach($content as $c) {
            unset($c['types']);
            array_push($data, $c);
        }
        Brand::insert($data);
    }
}
