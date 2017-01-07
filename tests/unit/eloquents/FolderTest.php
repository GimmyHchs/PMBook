<?php

namespace Tests\units\eloquents;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\DatabaseMigrations;

use Tests\TestCase;
use App\Project\Folder;
use App\Project\Project;

class FolderTest extends TestCase
{
    use DatabaseMigrations;
    use DatabaseTransactions;

    /**
     * 產生Folder.
     *
     * @group unit
     * @group project
     */
    public function testCanCreate()
    {
        $this->printTestStartMessage(__FUNCTION__);

        $folder = Folder::create([
            'name' => 'folder',
            'description' => 'pp',
        ]);

        $this->assertEquals($folder->name, 'folder');
        $this->assertEquals($folder->description, 'pp');
    }

    /**
     * Folder關聯於Project.
     *
     * @group unit
     * @group project
     */
    public function testCanAssignProject()
    {
        $this->printTestStartMessage(__FUNCTION__);

        $folder = Folder::create([
            'name' => 'folder',
            'description' => 'pp',
        ]);
        $project = factory(Project::class)->create();

        $folder->assignProject($project);
        $target = $project->folders()->first();

        $this->assertEquals($target->name, 'folder');
        $this->assertEquals($target->description, 'pp');
    }

}
