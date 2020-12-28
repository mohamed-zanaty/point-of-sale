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
            $table->bigInteger('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->bigInteger('admin_id')->unsigned();
            $table->foreign('admin_id')->references('id')->on('admins')->onDelete('cascade');
            $table->boolean('featured')->default(0);
            $table->boolean('status')->default(0);
            $table->string('image')->default('blog.png');
            $table->string('seo_title');
            $table->string('seo_description');
            $table->string('seo_keyword');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('blogs');
    }
}
