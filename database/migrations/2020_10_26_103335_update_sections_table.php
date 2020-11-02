<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('sections', function (Blueprint $table) {
        $table->dropColumn(['name','tealTitle', 'welcomeSubText','landingImage','landingImageCaption','buttons','actioncards']);
        $table->string('link',250)->default('#')->change();
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
