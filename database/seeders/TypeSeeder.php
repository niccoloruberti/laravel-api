<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Type;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i = 1; $i <= 2; $i++) {

            $type = new Type();

            $type->name = $faker->randomElement(['Frontend', 'Backend']);
            $type->slug = $type->generateSlug($type->name);

            $type->save();
        }
    }
}
