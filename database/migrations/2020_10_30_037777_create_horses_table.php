<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHorsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('horses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('cat_id');
            $table->foreign('cat_id')->references('id')->on('categories')->onDelete('cascade');;
            $table->unsignedBigInteger('col_id');
            $table->foreign('col_id')->references('id')->on('colors')->onDelete('cascade');;
            $table->year('year');
            $table->integer('height');
            $table->integer('length');
            $table->integer('chest');
            $table->unsignedBigInteger('l_id');
            $table->foreign('l_id')->references('id')->on('lines');
            $table->timestamps();
        });
        DB::statement("ALTER TABLE horses ADD img MEDIUMBLOB");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('horses');
    }
}
