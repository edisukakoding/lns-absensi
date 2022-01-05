<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkHoursTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('work_hours', function (Blueprint $table) {
      $table->id();
      $table->time('IN');
      $table->time('OUT');
      $table->enum('status', ['ACTIVE', 'INACTIVE'])->default('INACTIVE');
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
    Schema::dropIfExists('work_hours');
  }
}
