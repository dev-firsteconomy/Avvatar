<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('meta_title')->nullable();
            $table->string('meta_keyword')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('canonical')->nullable();
            $table->string('title')->nullable();
            $table->string('tag')->nullable();
            $table->string('slug')->nullable();
            $table->text('thumbnail_image')->nullable();
            $table->text('image')->nullable();
            $table->text('thumbnail_image')->nullable();
            $table->text('image')->nullable();
            $table->text('desk_banner')->nullable();
            $table->text('mob_banner')->nullable();
            $table->string('short_desc')->nullable();
            $table->text('description')->nullable();
            $table->date('date')->nullable();
            $table->enum('type', ['Blogs', 'Expert Speaks','Fitness Trends & Updates'])->default('Blogs');
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
        Schema::dropIfExists('blogs');
    }
}
