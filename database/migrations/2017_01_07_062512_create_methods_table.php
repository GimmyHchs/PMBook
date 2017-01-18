<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMethodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('methods', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('file_id')->unsigned()->nullable();
            $table->integer('method_type_id')->unsigned()->nullable();
            $table->string('name')->comment('方法名稱');
            $table->string('type')->comment('方法類型')->nullable();
            $table->string('description')->comment('方法描述');
            $table->timestamps();

            //foreign Key Set
            $table->foreign('file_id')->references('id')->on('files')->onDelete('cascade');
            $table->foreign('method_type_id')->references('id')->on('method_types')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('methods');
    }
}
