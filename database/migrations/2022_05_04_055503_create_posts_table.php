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
        Schema::create('posts', function (Blueprint $table) {
            $table->id('post_id');
			$table->unsignedBigInteger('post_category_id');
			$table->foreign('post_category_id')
		 		->references('cat_id')
				->on('categories');
			$table->string('post_title');
			$table->string('post_author');
			$table->string('post_image')->default(Null);
			$table->text('post_content');
			$table->string('post_tag');
			$table->bigInteger('post_comment_count')->default(0);
			$table->string('post_status');
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
};
