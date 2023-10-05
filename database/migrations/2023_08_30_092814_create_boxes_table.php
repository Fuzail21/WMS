<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('boxes', function (Blueprint $table) {
            $table->id('boxId');
            $table->string('boxName');
            $table->string('row_position');
            $table->string('column_position');
            $table->string('innerBox_position');
            $table->unsignedBigInteger('rack_id');
            $table->foreign('rack_id')->references('rack_id')->on('racks');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('boxes');
    }
};
