<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSerieinfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('serieinfos', function (Blueprint $table) {
            $table->id();
            $table->double("rating");
            $table->String("duration");
            $table->String("review");
            $table->String("type");
            $table->String("quality");
            $table->String("year");
            $table->integer("season_no");
            $table->integer("episode_no");
            $table->unsignedBigInteger("link_id");
            $table->foreign('link_id')
                 ->references('id')
                 ->on('links')
                 ->onDelete('cascade');
            $table->unsignedBigInteger('serie_id');
            $table->foreign('serie_id')
                 ->references('id')
                 ->on('series')
                 ->onDelete('cascade');



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
        Schema::dropIfExists('serieinfos');
    }
}
