<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStructurOrganizationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organizational_structures', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('employee')->unsigned();
            $table->bigInteger('boss')->unsigned()->nullable();
            $table->index('employee');
            $table->foreign('employee')->references('id')->on('employees')->onDelete('cascade');
            $table->index('boss');
            $table->foreign('boss')->references('id')->on('employees')->onUpdate('cascade');
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
        Schema::dropIfExists('organizational_structures');
    }
}
