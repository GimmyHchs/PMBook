<?php

use Illuminate\Database\Seeder;
use App\Project\Project;
use App\Project\Folder;
class FolderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $folders = factory(Folder::class, 25)->create();
        $projects = Project::all();
        foreach ($folders as $folder) {
            $project = $projects->random();
            $project->addFolder($folder);
        }
    }
}
