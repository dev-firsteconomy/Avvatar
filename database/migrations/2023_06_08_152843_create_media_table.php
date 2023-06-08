<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('tag')->nullable();
            $table->string('slug')->nullable();
            $table->text('thumbnail_image')->nullable();
            $table->string('short_desc')->nullable();
            $table->date('date')->nullable();
            $table->string('news_link')->nullable();
            $table->string('news_url')->nullable();
            $table->enum('type', ['Video', 'News','image'])->nullable();
            $table->tinyInteger('status')->default(0);
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
        Schema::dropIfExists('media');
    }
}
