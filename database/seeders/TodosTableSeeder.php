<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use Faker\Factory as Faker;

class TodosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for ($i = 0; $i < 100; $i++) {
            $image = $faker->image('public/adminAsset/image', 640, 480, null, false);
            DB::table('to_dos')->insert([
                'todo_title' => $faker->sentence,
                'description' => $faker->paragraph,
                'date' => $faker->date,
                'image' => str_replace('public/adminAsset/', '', $image),
                'UserName' => $faker->name,
                'created_at' => $faker->dateTime,
            ]);
        }
    }
}
