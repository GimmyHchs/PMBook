<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('folder_id')->unsigned()->nullable();
            $table->integer('file_type_id')->unsigned()->nullable();
            $table->string('name')->comment('檔案名稱');
            $table->string('type')->comment('檔案類型');
            $table->text('description')->nullable()->comment('檔案描述');
            $table->timestamps();

            //foreign Key Set
            $table->foreign('folder_id')->references('id')->on('folders')->onDelete('cascade');
            $table->foreign('file_type_id')->references('id')->on('file_types')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('files');
    }
}
