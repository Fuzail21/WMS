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
        Schema::create('packets', function (Blueprint $table) {
            $table->id('packetID');
            $table->string('jobNumber');
            $table->string('boxName');
            $table->string('packetDriver')->nullable();
            $table->unsignedBigInteger('pkgID');
            $table->string('materialDescription');
            $table->string('materialType');
            $table->string('numberOfBundles');
            $table->string('modifiedNumOfBundles')->nullable();
            $table->string('packetTruckNumber')->nullable();
            $table->string('deliveryLocation')->nullable();
            $table->string('statusOfDelivery')->nullable();
            $table->string('receivedBy')->nullable();
            $table->string('moveTo')->nullable();
            $table->string('packetLocation')->nullable();
            $table->string('modifiedDate')->nullable();
            $table->string('dateIn');
            $table->string('expectedDateOut')->nullable();
            $table->string('dateOut')->nullable();
            $table->string('remarksByReceiver')->nullable();
            $table->string('modifiedBy')->nullable();
            $table->foreign('pkgID')->references('pkgID')->on('packages');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('packets');
    }
};
