<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $technologies = config('db.technologies');
        foreach($technologies as $technology){
            $newTechnology = new Technology();
            $newTechnology->name = $technology['name'];
            $newTechnology->slug = Str::slug($technology['name'],'-');
            $newTechnology->icon = TechnologySeeder::storeimage($technology['icon'],$technology['name']);
            $newTechnology->save();
        }

    }
    public static function storeimage($img,$name){
        $url = $img;
        $contents = file_get_contents($url);
        $name = Str::slug($name,'-').'.jpg';
        $path = 'images/'. $name;
        Storage::put('images/'. $name,$contents);
        return $path;
    }
}
