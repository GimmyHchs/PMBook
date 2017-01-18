<?php

use Illuminate\Database\Seeder;
use App\Project\Project;
use App\Auth\User;

class ProjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $projects = factory(Project::class, 4)->create();
        $user = User::find(1);
        $user->joinProjects($projects);
    }
}
