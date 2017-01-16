<?php

namespace Tests\units\eloquents;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\DatabaseMigrations;

use Tests\TestCase;
use App\Project\File\Member;
use App\Project\File\File;
use App\Project\File\Types\MemberType;
use App\Project\Folder;

class MemberTest extends TestCase
{
    use DatabaseMigrations;
    use DatabaseTransactions;

    /**
     * 產生Member.
     *
     * @group unit
     * @group project
     */
    public function testCanCreate()
    {
        $this->printTestStartMessage(__FUNCTION__);

        $member = Member::create([
            'name' => 'a',
            'type' => 'const',
            'description' => 'const a',
        ]);

        $this->assertEquals($member->name, 'a');
        $this->assertEquals($member->type, 'const');
    }

    /**
     * 產生Member.
     *
     * @group unit
     * @group project
     */
    public function testCanFactory()
    {
        $this->printTestStartMessage(__FUNCTION__);

        $member = factory(Member::class)->create([
            'name' => 'a',
            'type' => 'const',
            'description' => 'const a',
        ]);

        $this->assertEquals($member->name, 'a');
        $this->assertEquals($member->type, 'const');
    }

    /**
     * 產生Member.
     *
     * @group unit
     * @group project
     */
    public function testCanAssignFile()
    {
        $this->printTestStartMessage(__FUNCTION__);

        $member = factory(Member::class)->create([
            'name' => 'a',
            'type' => 'const',
            'description' => 'const a',
        ]);
        $file = factory(File::class)->create([
            'name' => 'MyFile',
            'type' => 'Class',
        ]);
        $member->assignFile($file);
        $target = $member->file()->first();

        $this->assertEquals($target->name, 'MyFile');
        $this->assertEquals($target->type, 'Class');
    }

    /**
     * MemberType 與 Member關聯.
     *
     * @group unit
     * @group project
     */
    public function testCanAssignType()
    {
        $this->printTestStartMessage(__FUNCTION__);

        $type = factory(MemberType::class)->create([
            'name' => 'Class',
            'description' => 'A Basic Class',
        ]);
        $member = factory(Member::class)->create([
            'name' => 'member',
        ]);
        $member->assignType($type);
        $target = $member->type()->first();

        $this->assertEquals($target->name, 'Class');
    }

}
