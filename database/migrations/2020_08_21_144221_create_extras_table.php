<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExtrasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('extras', function (Blueprint $table) {
            $table->id();
            $table->double("rating");
            $table->String("duration");
            $table->String("review");
            $table->String("type");
            $table->String("quality");
            $table->String("year");
            $table->unsignedBigInteger("movie_id");
            $table->foreign('movie_id')
                 ->references('id')
                 ->on('movies')
                 ->onDelete('cascade');
                  /*$table->unsignedBigInteger("serie_id");
            $table->foreign('serie_id')
                 ->references('id')
                 ->on('series')
                 ->onDelete('cascade');*/
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
        Schema::dropIfExists('extras');
    }
}
