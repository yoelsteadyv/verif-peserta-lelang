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
        Schema::create('participant_reasons', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('peserta_id');
            $table->enum('status', ['BIDDING', 'DITOLAK']);
            $table->text('catatan')->nullable();
            $table->timestamps();

            $table->foreign('peserta_id')->references('id')->on('participants')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('participant_reasons');
    }
};
