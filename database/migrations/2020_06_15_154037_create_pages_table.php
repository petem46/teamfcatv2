<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->integer('section_id');
            $table->string('title');
            $table->string('subtitle');
            $table->string('slug');
            $table->text('htmlcontent');
            $table->text('jsoncontent');
            $table->integer('state_id');
            $table->integer('user_id');
            $table->timestamps();
            $table->softDeletes();

            $table->unique(['section_id', 'slug']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pages');
    }
}
