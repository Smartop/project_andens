<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('comment_id');
            $table->integer('user_id')->unsigned();
            
            $table->string('commentable_type');
            $table->integer('commentable_id')->unsigned();
            $table->text('body');
            $table->timestamps();
        });

        Schema::table('comments', function($table) {
        $table->foreign('user_id')
                    ->references('user_id')
                    ->on('users')
                    ->onDelete('cascade');
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
}
