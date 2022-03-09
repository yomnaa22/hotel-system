<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->integer('accompany_number');
            $table->integer('paid_price');
            $table->enum('status', ['pending', 'rejected', 'approved'])->default('pending');
            $table->integer('room_number');
            $table->foreign('room_number')->references('number')->on('rooms')->onDelete('cascade')->onUpdate('cascade')->primary();
            $table->foreignId('client_id')->constrained()->onDelete('cascade')->onUpdate('cascade')->primary();
            $table->foreignId('receptionist_id')->constrained()->onDelete('cascade')->onUpdate('cascade')->nullable();
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
        Schema::dropIfExists('reservations');
    }
}
