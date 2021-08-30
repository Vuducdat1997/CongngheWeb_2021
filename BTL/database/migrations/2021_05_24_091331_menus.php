<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Menus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type');
            $table->string('name');
            $table->string('menu_url')->nullable();
            $table->string('menu_order');
            $table->integer('parent_id');
            $table->timestamps();
        });
        DB::statement('ALTER TABLE menus ADD COLUMN page_id INT(10) UNSIGNED NULL AFTER menu_order');
        DB::statement('ALTER TABLE menus ADD CONSTRAINT menu_category FOREIGN KEY (page_id) REFERENCES categories(id)');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menus');
    }
}