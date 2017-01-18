<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('file_id')->unsigned()->nullable();
            $table->integer('member_type_id')->unsigned()->nullable();
            $table->string('name')->comment('成員名稱');
            $table->string('type')->comment('成員類型')->nullable();
            $table->string('description')->comment('成員描述');
            $table->timestamps();

            //foreign Key Set
            $table->foreign('member_type_id')->references('id')->on('member_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('members');
    }
}
