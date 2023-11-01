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
        Schema::create('inn_addresses', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('inn_id')->unsigned();
            $table->foreign('inn_id')->references('id')->on('inns')->onDelete('cascade');
            $table->string('country')->default('CZ');
            $table->string('street');
            $table->string('post_code', 7);
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->string('city');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};
