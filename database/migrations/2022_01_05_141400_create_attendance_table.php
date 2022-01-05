<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttendanceTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('attendances', function (Blueprint $table) {
      $table->id();
      $table->bigInteger('employee_id')->unsigned();
      $table->date('attendance_date');
      $table->time('checkin_limit');
      $table->time('checkin_time')->nullable();
      $table->time('checkout_limit');
      $table->time('checkout_time')->nullable();
      $table->index('employee_id');
      $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');
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

    Schema::dropIfExists('attendances');
  }
}
