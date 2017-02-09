<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Migrations\Migration;

class CreateForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('socials', function ($table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
        Schema::table('posts', function ($table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
        Schema::table('repo_pages', function ($table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('repo_id')->references('id')->on('repos')->onDelete('cascade');
        });
        Schema::table('repos', function ($table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
        Schema::table('post_tag', function ($table) {
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
            $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');
        });
        Schema::table('comments', function ($table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('socials', function ($table) {
            $table->dropForeign('socials_user_id_foreign');
        });
        Schema::table('posts', function ($table) {
            $table->dropForeign('posts_user_id_foreign');
        });
        Schema::table('repo_pages', function ($table) {
            $table->dropForeign('repo_pages_repo_id_foreign');
            $table->dropForeign('repo_pages_user_id_foreign');
        });
        Schema::table('repos', function ($table) {
            $table->dropForeign('repos_user_id_foreign');
        });
        Schema::table('post_tag', function ($table) {
            $table->dropForeign('post_tag_post_id_foreign');
            $table->dropForeign('post_tag_tag_id_foreign');
        });
        Schema::table('comments', function ($table) {
            $table->dropForeign('comments_post_id_foreign');
            $table->dropForeign('comments_user_id_foreign');
        });
    }
}
