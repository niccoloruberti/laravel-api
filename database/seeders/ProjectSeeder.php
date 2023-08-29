<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Project;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i=1; $i<=10; $i++) {
            $project = new Project();

            $project->name = $faker->sentence(3);
            $project->link_repository = $faker->url();
            $project->img = $faker->imageUrl(640, 480);
            $project->topic = $faker->word();
            $project->slug = $project->generateSlug($project->name);

            $project->save();
        }
    }
}
