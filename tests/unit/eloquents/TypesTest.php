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

class TypesTest extends TestCase
{
    use DatabaseMigrations;
    use DatabaseTransactions;


    /**
     * 產生FileType.
     *
     * @group unit
     * @group project
     */
    public function testCanCreateFileType()
    {
        $this->printTestStartMessage(__FUNCTION__);

        $type = FileType::create([
            'name' => 'Class',
            'description' => 'A Basic Class',
        ]);

        $this->assertEquals($type->name, 'Class');
        $this->assertEquals($type->description, 'A Basic Class');
    }
    /**
     * 產生FileType.
     *
     * @group unit
     * @group project
     */
    public function testCanFactoryFileType()
    {
        $this->printTestStartMessage(__FUNCTION__);

        $type = factory(FileType::class)->create([
            'name' => 'Class',
            'description' => 'A Basic Class',
        ]);

        $this->assertEquals($type->name, 'Class');
        $this->assertEquals($type->description, 'A Basic Class');
    }
    /**
     * 產生MethodType.
     *
     * @group unit
     * @group project
     */
    public function testCanCreateMethodType()
    {
        $this->printTestStartMessage(__FUNCTION__);

        $type = MethodType::create([
            'name' => 'Class',
            'description' => 'A Basic Class',
        ]);

        $this->assertEquals($type->name, 'Class');
        $this->assertEquals($type->description, 'A Basic Class');
    }
    /**
     * 產生MethodType.
     *
     * @group unit
     * @group project
     */
    public function testCanFactoryMethodType()
    {
        $this->printTestStartMessage(__FUNCTION__);

        $type = factory(MethodType::class)->create([
            'name' => 'Class',
            'description' => 'A Basic Class',
        ]);

        $this->assertEquals($type->name, 'Class');
        $this->assertEquals($type->description, 'A Basic Class');
    }
    /**
     * 產生MemberType.
     *
     * @group unit
     * @group project
     */
    public function testCanCreateMemberType()
    {
        $this->printTestStartMessage(__FUNCTION__);

        $type = MemberType::create([
            'name' => 'Class',
            'description' => 'A Basic Class',
        ]);

        $this->assertEquals($type->name, 'Class');
        $this->assertEquals($type->description, 'A Basic Class');
    }
    /**
     * 產生MemberType.
     *
     * @group unit
     * @group project
     */
    public function testCanFactoryMemberType()
    {
        $this->printTestStartMessage(__FUNCTION__);

        $type = factory(MemberType::class)->create([
            'name' => 'Class',
            'description' => 'A Basic Class',
        ]);

        $this->assertEquals($type->name, 'Class');
        $this->assertEquals($type->description, 'A Basic Class');
    }


    /**
     * MemberType 與 Member關聯.
     *
     * @group unit
     * @group project
     */
    public function testCanAddMember()
    {
        $this->printTestStartMessage(__FUNCTION__);

        $type = factory(MemberType::class)->create([
            'name' => 'Const',
            'description' => 'A Basic Const Variable',
        ]);
        $member = factory(Member::class)->create([
            'name' => 'member',
        ]);
        $type->addChild($member);
        $target = $type->children()->first();

        $this->assertEquals($target->name, 'member');
    }
    /**
     * FileType 與 File關聯.
     *
     * @group unit
     * @group project
     */
    public function testCanAddFile()
    {
        $this->printTestStartMessage(__FUNCTION__);

        $type = factory(FileType::class)->create([
            'name' => 'Class',
            'description' => 'A Basic Class',
        ]);
        $file = factory(File::class)->create([
            'name' => 'file',
        ]);
        $type->addChild($file);
        $target = $type->children()->first();

        $this->assertEquals($target->name, 'file');
    }
    /**
     * MethodType 與 Method.
     *
     * @group unit
     * @group project
     */
    public function testCanAddMethod()
    {
        $this->printTestStartMessage(__FUNCTION__);

        $type = factory(MethodType::class)->create([
            'name' => 'public',
            'description' => 'A Basic public method',
        ]);
        $method = factory(Method::class)->create([
            'name' => 'create',
        ]);
        $type->addChild($method);
        $target = $type->children()->first();

        $this->assertEquals($target->name, 'create');
    }
}
