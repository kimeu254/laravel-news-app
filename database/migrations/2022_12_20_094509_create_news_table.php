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
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('headline');
            $table->unsignedBigInteger('region_id')->index();
            $table->unsignedBigInteger('category_id')->index();
            $table->string('image');
            $table->string('caption')->nullable();
            $table->longText('story');
            $table->string('image_one')->nullable();
            $table->string('caption_one')->nullable();
            $table->longText('story_one')->nullable();
            $table->string('url')->nullable();
            $table->longText('story_two')->nullable();
            $table->unsignedBigInteger('posted_by')->index();
            $table->foreign('region_id')
                ->references('id')
                ->on('regions')
                ->onDelete('cascade');
            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->onDelete('cascade');
            $table->foreign('posted_by')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
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
        Schema::dropIfExists('news');
    }
};
