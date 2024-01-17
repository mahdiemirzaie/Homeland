<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\City;
use App\Models\Estate;
use App\Models\Fav;
use App\Models\User;
use Illuminate\Database\Seeder;

class EstateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(10)->create()->each(function (User $user) {
            Estate::factory(5)->create([
                'user_id' => $user->id,
                'city_id' => City::all()->random()->id,
                'category_id' => Category::all()->random()->id,
            ])->each(function ($estate) use ($user) {
                $estate->attachTag(collect(["لاکچری", "لوکس", "نوساز"])->random());
                $estate->comments()->create([
                    'user_id' => $user->id,
                    "comment" => fake()->text,
                    'parent_id' => null,
                    'published' => 0
                ]);
                Fav::factory()->create([
                    'user_id' => $user->id,
                    'favable_type'=>get_class($estate),
                    'favable_id'=>$estate->id
                ]);
            });
        });

    }
}
