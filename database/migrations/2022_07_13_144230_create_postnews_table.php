<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('postnews', function (Blueprint $table) {
            $table->bigIncrements('news_id');
            $table->string('news_title');
            $table->string('news_subtitle')->nullable();
            $table->integer('news_category')->nullable();
            $table->text('news_details')->nullable();
            $table->string('news_image')->nullable();
            $table->text('news_gallery')->nullable();
            $table->string('news_slug');
            $table->integer('news_feature')->default(0)->nullable();
            $table->integer('news_tranding')->default(0)->nullable();
            $table->integer('news_latest')->default(0)->nullable();
            $table->integer('news_hot')->default(0)->nullable();
            $table->integer('news_creator');
            $table->integer('news_editor')->nullable();
            $table->integer('news_status')->default(0);
            $table->integer('news_delete')->default(1);
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
        Schema::dropIfExists('postnews');
    }
};
