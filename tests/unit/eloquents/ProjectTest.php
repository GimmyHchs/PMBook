<?php

namespace Tests\units\eloquents;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\DatabaseMigrations;

use Tests\TestCase;
use App\Project\Project;
use App\Project\Folder;
use App\Auth\User;

class ProjectTest extends TestCase
{
    use DatabaseMigrations;
    use DatabaseTransactions;

    /**
     * 產生Project.
     *
     * @group unit
     * @group project
     */
    public function testCanCreate()
    {
        $this->printTestStartMessage(__FUNCTION__);

        $project = Project::create([
            'prefix' => 'myprefix',
            'name' => 'myproject',
            'nick' => 'pp',
        ]);

        $this->assertEquals($project->name, 'myproject');
        $this->assertEquals($project->nick, 'pp');
    }

    /**
     * Project下關聯一個Folder.
     *
     * @group unit
     * @group project
     */
    public function testCanAddFolder()
    {
        $this->printTestStartMessage(__FUNCTION__);

        $project = Project::create([
            'prefix' => 'myprefix',
            'name' => 'myproject',
            'nick' => 'pp',
        ]);
        $folder = factory(Folder::class)->create();

        $project->addFolder($folder);
        $target = $folder->project()->first();

        $this->assertEquals($target->name, 'myproject');
        $this->assertEquals($target->nick, 'pp');
    }

    /**
     * Project下關聯一個User.
     *
     * @group unit
     * @group project
     */
    public function testCanAssignUser()
    {
        $this->printTestStartMessage(__FUNCTION__);

        $project = Project::create([
            'prefix' => 'myprefix',
            'name' => 'myproject',
            'nick' => 'pp',
        ]);
        $user = factory(User::class)->create();
        $user2 = factory(User::class)->create();

        $project->assignUser($user);
        $project->assignUser($user2);
        $project->assignUser($user);

        $target = $project->getUsers()->first();

        $this->assertEquals($target->name, $user->name);
        $this->assertEquals($target->email, $user->email);
    }

}
