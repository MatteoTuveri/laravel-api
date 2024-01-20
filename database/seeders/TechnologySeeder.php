<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $technologies = ['Laravel','HTML','CSS'];
        foreach($technologies as $technology){
            $newtechnology = new Technology();
            $newtechnology->name = $technology;
            $newtechnology->slug = Str::slug($technology,'-');
            $newtechnology->save();
        }
    }
}
