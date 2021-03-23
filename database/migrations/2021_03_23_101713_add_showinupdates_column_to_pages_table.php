<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddshowinupdatesColumnToPagesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::table('pages', function (Blueprint $table) {
      $table->integer('showinupdates')->nullable()->after('state_id');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::table('pages', function (Blueprint $table) {
      $table->dropColumn('showinupdates');
    });
  }
}
