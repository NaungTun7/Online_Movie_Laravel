<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActorSerieTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actor_serie', function (Blueprint $table) {
            $table->id();
           $table->unsignedBigInteger('actor_id');
            $table->foreign('actor_id')
                 ->references('id')
                 ->on('actors')
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
        Schema::dropIfExists('actor_serie');
    }
}
