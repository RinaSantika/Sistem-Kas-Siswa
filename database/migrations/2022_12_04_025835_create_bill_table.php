<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bill', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vehicle_id')->constrained('vehicle');
            $table->foreignId('customer_id')->constrained('customer');
            $table->integer('amount');
            $table->string('price');
            $table->integer('helmet')->nullable();
            $table->string('starting_date');
            $table->string('end_date');
            $table->string('extend_date')->nullable();
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
        Schema::dropIfExists('bill');
    }
};
