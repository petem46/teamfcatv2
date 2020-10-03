<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use phpDocumentor\Reflection\Types\Nullable;

class CreateSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sections', function (Blueprint $table) {
            $table->id();
            $table->integer('area_id');
            $table->string('name');
            $table->string('title')->nullable();
            $table->string('tealTitle')->nullable();
            $table->string('subTitle')->nullable();
            $table->string('welcomeSubText')->nullable();
            $table->string('link');
            $table->string('landingImage');
            $table->string('landingImageCaption');
            $table->JSON('buttons');
            $table->JSON('actioncards');
            $table->integer('active');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sections');
    }
}
