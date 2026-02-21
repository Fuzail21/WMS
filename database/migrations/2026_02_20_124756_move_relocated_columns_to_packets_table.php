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
        // Add relocatedAt and relocatedFromBox to packets table
        Schema::table('packets', function (Blueprint $table) {
            $table->string('relocatedAt')->nullable();
            $table->string('relocatedFromBox')->nullable();
        });

        // Remove relocatedAt and relocatedFromBox from packages table
        Schema::table('packages', function (Blueprint $table) {
            $table->dropColumn(['relocatedAt', 'relocatedFromBox']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Restore columns on packages table
        Schema::table('packages', function (Blueprint $table) {
            $table->string('relocatedAt')->nullable();
            $table->string('relocatedFromBox')->nullable();
        });

        // Remove from packets table
        Schema::table('packets', function (Blueprint $table) {
            $table->dropColumn(['relocatedAt', 'relocatedFromBox']);
        });
    }
};
