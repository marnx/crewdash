<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCertificateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('certificate', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('name_file');
            $table->string('status')->default('open');
            $table->string('notification')->default('NULL');
            $table->string('code');
            $table->timestamps();
            //$table->date('expiration_date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('certificate');
    }
}
