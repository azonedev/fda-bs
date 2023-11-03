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
        Schema::create('rider_captures', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rider_id')->constrained('riders');
            $table->string('service_name');
            $table->decimal('lat', 10, 7);
            $table->decimal('long', 10, 7);
            $table->timestamp('capture_time');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rider_capture');
    }
};
