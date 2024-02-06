<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::insert([
            [
                'name'=>'Properties',
                'level'=>null,
                'status'=>true,
                'slug'=>'properties',
                'parent_id'=>null,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
              [
                'name'=>'Classified',
                'level'=>null,
                'status'=>true,
                'slug'=>'classified',
                'parent_id'=>null,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
              [
                'name'=>'Bus Ticketing',
                'level'=>null,
                'status'=>true,
                'slug'=>'bus-ticketing',
                'parent_id'=>null,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
        ]);

        $categories=Category::all();
        Category::all()->map(function ($categories) {
            $categories->addMedia(public_path('demo_images/category/cat-' . rand(1, 3) . '.jpg'))->preservingOriginal()->toMediaCollection('image');
        });
    }
}
