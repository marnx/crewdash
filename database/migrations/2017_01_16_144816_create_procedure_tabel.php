<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProcedureTabel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('procedure', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code');
            $table->string('name');
            $table->string('name_file');
            $table->string('status')->default('open');
            $table->string('notification')->default('NULL');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('procedure');
    }
}
