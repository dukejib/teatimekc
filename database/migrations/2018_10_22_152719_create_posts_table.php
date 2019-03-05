<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id'); //User Id
            $table->string('title');
            $table->string('shortnote',255); //About post
            $table->string('slug');
            $table->text('content');
            $table->integer('category_id'); 
            $table->string('featured'); //Image
            $table->integer('published')->default(0); //0 - unpublished , 1 - published
            $table->timestamp('published_at')->nullable();
            $table->boolean('urdu')->default(false); //Not Urdu
            $table->softDeletes();  //Keeps the data in for later delete - Creates deleted_at column
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
        Schema::dropIfExists('posts');
    }
}
