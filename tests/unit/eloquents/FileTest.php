<?php

namespace Tests\units\eloquents;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\DatabaseMigrations;

use Tests\TestCase;
use App\Project\File\File;
use App\Project\Folder;

class FileTest extends TestCase
{
    use DatabaseMigrations;
    use DatabaseTransactions;

    /**
     * 產生Class.
     *
     * @group unit
     * @group project
     */
    public function testCanCreate()
    {
        $this->printTestStartMessage(__FUNCTION__);

        $file = File::create([
            'name' => 'Article',
            'type' => 'php',
            'description' => 'Artilce Model',
        ]);

        $this->assertEquals($file->name, 'Article');
        $this->assertEquals($file->type, 'php');
    }

    /**
     * 產生Class.
     *
     * @group unit
     * @group project
     */
    public function testCanFactory()
    {
        $this->printTestStartMessage(__FUNCTION__);

        $file = factory(File::class)->create([
            'name' => 'Article',
            'type' => 'php',
            'description' => 'Artilce Model',
        ]);

        $this->assertEquals($file->name, 'Article');
        $this->assertEquals($file->type, 'php');
    }

}
