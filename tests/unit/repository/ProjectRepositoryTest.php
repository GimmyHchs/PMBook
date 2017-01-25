<?php

namespace Tests\units\eloquents;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\DatabaseMigrations;

use Tests\TestCase;
use App\Project\File\File;
use App\Project\File\Member;
use App\Project\File\Method;
use App\Project\File\Types\FileType;
use App\Project\Folder;
use App\Project\Project;

use App\Project\ProjectRepository;
use App;

class ProjectRepositoryTest extends TestCase
{
    use DatabaseMigrations;
    use DatabaseTransactions;

    /**
     * @var ProjectRepository
     */
    private $repository;

    private function initRepository()
    {
        $this->repository = null;
        $this->repository = App::make(ProjectRepository::class);
    }

    /**
     * 建構repository.
     *
     * @group unit
     * @group repository
     */
    public function testCanInitRepo()
    {
        $this->printTestStartMessage(__FUNCTION__);
        $this->initRepository();

        $this->assertNotNull($this->repository);
    }

    /**
     * 創建project.
     *
     * @group unit
     * @group repository
     */
    public function testCanSave()
    {
        $this->printTestStartMessage(__FUNCTION__);
        $this->initRepository();

        $this->repository->save([
            'prefix' => 'myprefix',
            'name' => 'myproject',
            'nick' => 'mp',
        ]);

        $target = Project::find(1);

        $this->assertEquals($target->name, 'myproject');
        $this->assertEquals($target->nick, 'mp');
    }

    /**
     * 刪除多個project.
     *
     * @group unit
     * @group repository
     */
    public function testCanDeleteMany()
    {
        $this->printTestStartMessage(__FUNCTION__);
        $this->initRepository();
        $projects = factory(Project::class, 5)->create();

        $this->repository->deleteMany($projects);

        $count = count(Project::all());
        $this->assertEquals($count, 0);
    }
}
