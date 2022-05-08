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
        Schema::create('comments', function (Blueprint $table) {
            $table->id('comment_id');
			$table->unsignedBigInteger('comment_post_id');
			$table->foreign('comment_post_id')
				 ->references('post_id')
				 ->on('posts');
			$table->unsignedBigInteger('comment_user_id');
			$table->foreign('comment_user_id')
				 ->references('user_id')
				 ->on('users');
			$table->text('comment_content');
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
        Schema::dropIfExists('comments');
    }
};
