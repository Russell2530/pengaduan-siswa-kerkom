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
        // Check if the column exists before adding it
        if (!Schema::hasColumn('pengaduan', 'status')) {
            Schema::table('pengaduan', function (Blueprint $table) {
                $table->string('status')->default('Diproses');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasColumn('pengaduan', 'status')) {
            Schema::table('pengaduan', function (Blueprint $table) {
                $table->dropColumn('status');
            });
        }
    }
};
