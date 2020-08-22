<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuggessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suggessions', function (Blueprint $table) {
            $table->id();
            $table->String("comment");
            $table->unsignedBigInteger("movie_id");
            $table->foreign('movie_id')
                 ->references('id')
                 ->on('movies')
                 ->onDelete('cascade');
                  $table->unsignedBigInteger("serie_id");
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
        Schema::dropIfExists('suggessions');
    }
}
