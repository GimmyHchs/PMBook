<?php

namespace Tests\units\eloquents;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\DatabaseMigrations;

use Tests\TestCase;
use App\Project\File\Method;
use App\Project\File\Types\MethodType;
use App\Project\File\File;
use App\Project\Folder;

class MethodTest extends TestCase
{
    use DatabaseMigrations;
    use DatabaseTransactions;

    /**
     * 產生Method.
     *
     * @group unit
     * @group project
     */
    public function testCanCreate()
    {
        $this->printTestStartMessage(__FUNCTION__);

        $method = Method::create([
            'name' => 'a',
            'type' => 'const',
            'description' => 'const a',
        ]);

        $this->assertEquals($method->name, 'a');
        $this->assertEquals($method->type, 'const');
    }

    /**
     * 產生Method.
     *
     * @group unit
     * @group project
     */
    public function testCanFactory()
    {
        $this->printTestStartMessage(__FUNCTION__);

        $method = factory(Method::class)->create([
            'name' => 'a',
            'type' => 'const',
            'description' => 'const a',
        ]);

        $this->assertEquals($method->name, 'a');
        $this->assertEquals($method->type, 'const');
    }

    /**
     * File關聯Method.
     *
     * @group unit
     * @group project
     */
    public function testCanAssignFile()
    {
        $this->printTestStartMessage(__FUNCTION__);

        $method = factory(Method::class)->create([
            'name' => 'a',
            'type' => 'const',
            'description' => 'const a',
        ]);
        $file = factory(File::class)->create([
            'name' => 'MyFile',
            'type' => 'Class',
        ]);
        $method->assignFile($file);
        $target = $method->file()->first();

        $this->assertEquals($target->name, 'MyFile');
        $this->assertEquals($target->type, 'Class');
    }


    /**
     * MethodType 與 Method關聯.
     *
     * @group unit
     * @group project
     */
    public function testCanAssignType()
    {
        $this->printTestStartMessage(__FUNCTION__);

        $type = factory(MethodType::class)->create([
            'name' => 'Class',
            'description' => 'A Basic Class',
        ]);
        $method = factory(Method::class)->create([
            'name' => 'member',
        ]);
        $method->assignType($type);
        $target = $method->type()->first();

        $this->assertEquals($target->name, 'Class');
    }

}
