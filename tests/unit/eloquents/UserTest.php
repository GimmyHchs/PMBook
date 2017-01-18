<?php

namespace Tests\units\eloquents;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\DatabaseMigrations;

use Tests\TestCase;
use App\Project\Project;
use App\Project\Folder;
use App\Project\File\Member;
use App\Project\File\File;
use App\Project\File\Method;
use App\Project\File\Types\FileType;
use App\Project\File\Types\MethodType;
use App\Project\File\Types\MemberType;
use App\Auth\User;

class UserTest extends TestCase
{
    use DatabaseMigrations;
    use DatabaseTransactions;
    /**
     * 產生User.
     *
     * @group unit
     * @group auth
     */
    public function testCanCreate()
    {
        $this->printTestStartMessage(__FUNCTION__);

        $user = User::create([
            'name' => 'Test User',
            'project_prefix' => 'ttttt',
            'password' => encrypt('123456'),
            'email' => 'test@test.com.tw',
        ]);

        $this->assertEquals($user->name, 'Test User');
        $this->assertEquals($user->email, 'test@test.com.tw');
    }
    /**
     * 產生User.
     *
     * @group unit
     * @group auth
     */
    public function testCanFactory()
    {
        $this->printTestStartMessage(__FUNCTION__);

        $user = factory(User::class)->create([
            'name' => 'Test User',
            'password' => encrypt('123456'),
            'email' => 'test@test.com.tw',
        ]);

        $this->assertEquals($user->name, 'Test User');
        $this->assertEquals($user->email, 'test@test.com.tw');
    }
    /**
     * User 與 Project關聯.
     *
     * @group unit
     * @group auth
     */
    public function testCanJoinProject()
    {
        $this->printTestStartMessage(__FUNCTION__);

        $user = factory(User::class)->create([
            'name' => 'Test User',
            'password' => encrypt('123456'),
            'email' => 'test@test.com.tw',
        ]);
        $project = factory(Project::class)->create(['name' => 'myproject']);
        $project2 = factory(Project::class)->create(['name' => 'myproject2']);

        $user->joinProject($project);
        $user->joinProject($project2);
        $user->joinProject($project); // will not work

        $target = $project->users()->orderBy('id','ASC')->first();
        $this->assertEquals($user->name, 'Test User');
        $this->assertEquals($user->email, 'test@test.com.tw');
        $this->assertEquals(count($user->projects()->get()), 2);
    }

    /**
     * User 與 Project關聯.
     *
     * @group unit
     * @group auth
     */
    public function testCanJoinProjects()
    {
        $this->printTestStartMessage(__FUNCTION__);

        $user = factory(User::class)->create([
            'name' => 'Test User',
            'password' => encrypt('123456'),
            'email' => 'test@test.com.tw',
        ]);
        $project = factory(Project::class)->create(['name' => 'myproject']);
        $project2 = factory(Project::class)->create(['name' => 'myproject2']);

        $projects = Project::all();
        $user->joinProjects($projects);

        $this->assertEquals(count($user->projects()->get()), 2);
    }

}
