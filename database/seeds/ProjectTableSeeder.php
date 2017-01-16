<?php

use Illuminate\Database\Seeder;
use App\Project\Project;

class ProjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Project::class, 4)->create();
    }
}
