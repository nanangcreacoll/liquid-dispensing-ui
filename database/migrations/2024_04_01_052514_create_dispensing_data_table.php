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
        Schema::create('dispensing_data', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('volume')->nullable(false);
            $table->integer('capsule_qty')->nullable(false);
            $table->unsignedBigInteger("user_id")->nullable(false);
            $table->foreign("user_id")->on("users")->references("id");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dispensing_data');
    }
};
