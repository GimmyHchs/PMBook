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
        $user = User::find(1);

        $projects = factory(Project::class, 4)->make();
        
        $projects->each(function ($project, $key) use ($user){
            $user->createProject($project);
        });

        $user->joinProjects($projects);


    }
}
