<?php
namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('models')->truncate();

        $filename = 'database/seeders/data/models.json';
        $content = json_decode(File::get($filename), true);
        $data = [];

        // Sort by brand, remove brand from data
        foreach($content as $model) {
            $brand = $model['brand'];
            unset($model['brand']);
            if (array_key_exists($brand, $data)) {
                array_push($data[$brand], $model);
            } else {
                $data[$brand] = ['name' => $model ];
            }
        }


        // Search brands and insert
        foreach($data as $brand => $_) {
            $b_id = Brand::firstWhere('name', $brand)->id ?? null;
            $new_data = [];
            foreach ($data[$brand] as $model) {
                $model['brand_id'] = $b_id;
                array_push($new_data, $model);
            }
            Model::insert($new_data);
        }
    }
}

