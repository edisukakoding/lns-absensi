<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('uid');
            $table->string('name');
            $table->text('visi')->nullable();
            $table->text('visi_desc')->nullable();
            $table->text('misi')->nullable();
            $table->text('location')->nullable();
            $table->string('email')->nullable();
            $table->string('telephone')->nullable();
            $table->text('map')->nullable();
            $table->text('logo')->nullable();
            $table->text('background')->nullable();
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
        Schema::dropIfExists('companies');
    }
}
