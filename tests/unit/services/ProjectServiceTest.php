<?php

namespace Tests\units\services;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\DatabaseMigrations;

use Tests\TestCase;
use App\Project\Services\ProjectService;
use App\Project\File\File;
use App\Project\File\Member;
use App\Project\File\Method;
use App\Project\File\Types\FileType;
use App\Project\Folder;
use App\Project\Project;

class ProjectServiceTest extends TestCase
{
    use DatabaseMigrations;
    use DatabaseTransactions;

    /**
     * New 一個Service.
     *
     * @group unit
     * @group service
     */
    public function testCanNew()
    {
        $service = new ProjectService();
        $this->assertNotNull($service);
    }
}
