<?php

namespace Tests\units\eloquents;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\DatabaseMigrations;

use Tests\TestCase;
use App\Project\File\File;
use App\Project\File\Member;
use App\Project\File\Method;
use App\Project\Folder;

class FileTest extends TestCase
{
    use DatabaseMigrations;
    use DatabaseTransactions;

    /**
     * 產生File.
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
     * 產生File.
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

    /**
     * File關聯於Folder.
     *
     * @group unit
     * @group project
     */
    public function testCanAssignFolder()
    {
        $this->printTestStartMessage(__FUNCTION__);

        $folder = Folder::create([
            'name' => 'folder',
            'description' => 'pp',
        ]);
        $file = factory(File::class)->create([
            'name' => 'FirstClass',
            'type' => 'Class',
        ]);

        $file->assignFolder($folder);
        $target = $file->folder()->first();

        $this->assertEquals($target->name, 'folder');
        $this->assertEquals($target->description, 'pp');
    }

    /**
     * File關聯於Member.
     *
     * @group unit
     * @group project
     */
    public function testCanAddMember()
    {
        $this->printTestStartMessage(__FUNCTION__);

        $member = Member::create([
            'name' => 'a',
            'description' => 'pp',
        ]);
        $file = factory(File::class)->create([
            'name' => 'FirstClass',
            'type' => 'Class',
        ]);

        $file->addMember($member);
        $target = $file->members()->first();

        $this->assertEquals($target->name, 'a');
        $this->assertEquals($target->description, 'pp');
    }

    /**
     * File關聯於Method.
     *
     * @group unit
     * @group project
     */
    public function testCanAddMethod()
    {
        $this->printTestStartMessage(__FUNCTION__);

        $method = Method::create([
            'name' => 'a',
            'description' => 'pp',
        ]);
        $file = factory(File::class)->create([
            'name' => 'FirstClass',
            'type' => 'Class',
        ]);

        $file->addMethod($method);
        $target = $file->methods()->first();

        $this->assertEquals($target->name, 'a');
        $this->assertEquals($target->description, 'pp');
    }

}
