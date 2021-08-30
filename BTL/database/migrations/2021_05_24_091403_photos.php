<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Photos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('image');
            $table->longText('desc');
            $table->timestamps();
        });
        DB::statement('ALTER TABLE photos ADD COLUMN photogroups_id INT(10) UNSIGNED NULL AFTER id');
        DB::statement('ALTER TABLE photos ADD CONSTRAINT photo_photogroups FOREIGN KEY (photogroups_id) REFERENCES photogroups(id)');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('photos');
    }
}