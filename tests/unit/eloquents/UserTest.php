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
        $user->joinProject($project);
        $target = $project->users()->first();
        $this->assertEquals($user->name, 'Test User');
        $this->assertEquals($user->email, 'test@test.com.tw');
    }

}
