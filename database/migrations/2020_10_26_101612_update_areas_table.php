<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Query\Expression;

class UpdateAreasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('areas', function (Blueprint $table) {
      // $table->id();
      // $table->string('name');
      $table->JSON('actioncards')->default(new Expression('(JSON_ARRAY())'))->after('name');
      $table->JSON('buttons')->default(new Expression('(JSON_ARRAY())'))->after('name');
      $table->string('landingImageCaption')->after('name');
      $table->string('landingImage')->after('name');
      $table->string('link')->after('name');
      $table->string('welcomeSubText')->nullable()->after('name');
      $table->string('subTitle')->nullable()->after('name');
      $table->string('tealTitle')->nullable()->after('name');
      $table->string('title')->nullable()->after('name');
      // $table->integer('active');
      // $table->timestamps();
      // $table->softDeletes();
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {Schema::table('areas', function (Blueprint $table) {
      $table->dropColumn(['title', 'tealTitle', 'subTitle', 'welcomeSubText','link','landingImage','landingImageCaption','buttons','actioncards']);
    });
    }
}
