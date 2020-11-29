<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->enum('room_type', ['single', 'double', 'triple']);
            $table->double('room_price', 8, 2);
            $table->boolean('wifi');
            $table->boolean('tv');
            $table->date('arrival_time');
            $table->date('departure_time');
            $table->boolean('is_vacant');
            $table->integer('reservation_count');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rooms');
    }
}
