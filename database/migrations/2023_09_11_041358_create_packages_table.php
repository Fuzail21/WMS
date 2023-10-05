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
        Schema::create('packages', function (Blueprint $table) {
            $table->id('pkgID');
            $table->string('jobNumber')->nullable();
            $table->string('boxName')->nullable();
            $table->string('pkgName');
            $table->unsignedBigInteger('boxId');
            $table->string('materialDescription')->nullable();
            $table->string('purchasingAgent');
            $table->string('materialType')->nullable();
            $table->string('truckNumber')->nullable();
            $table->string('deliveryLocation')->nullable();
            $table->string('pm');
            $table->string('numberOfBundles')->nullable();
            $table->string('dateIn');
            $table->string('expectedDateOut');
            $table->string('dateOut')->nullable();
            $table->string('removingNote')->nullable();
            $table->string('removingDriver')->nullable();
            $table->foreign('boxId')->references('boxId')->on('boxes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('packages');
    }
};
