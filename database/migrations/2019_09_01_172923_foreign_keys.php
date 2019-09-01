<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->integer('user_id')
                  ->unsigned()
                  ->change();

            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');
        });

        Schema::table('tags', function (Blueprint $table) {
            $table->increments('id')
                  ->change();
        });

        Schema::table('post_tag', function (Blueprint $table) {
            $table->integer('post_id')
                  ->unsigned()
                  ->change();

            $table->integer('tag_id')
                  ->unsigned()
                  ->change();

            $table->foreign('post_id')
                  ->references('id')
                  ->on('posts');

            $table->foreign('tag_id')
                  ->references('id')
                  ->on('tags');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
