<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class News extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->increments('id');
            $table->longText('title');
            $table->longText('desc');
            $table->longText('details');
            $table->longText('slug');
            $table->string('image')->nullable();
            $table->integer('status');
            $table->integer('featured');
            $table->integer('view_count')->nullable();
            $table->timestamps();
        });

        DB::statement('ALTER TABLE news ADD COLUMN categories_id INT(10) UNSIGNED NULL AFTER id');
        DB::statement('ALTER TABLE news ADD COLUMN user_id INT(10) UNSIGNED NULL AFTER categories_id');

        DB::statement('ALTER TABLE news ADD CONSTRAINT news_categories FOREIGN KEY (categories_id) REFERENCES categories(id)');
        DB::statement('ALTER TABLE news ADD CONSTRAINT news_users FOREIGN KEY (user_id) REFERENCES users(id)');
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
}