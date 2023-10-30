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
        Schema::create('inn_opening_hours', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('inn_id')->unsigned();
            $table->foreign('inn_id')->references('id')->on('inns')->onDelete('cascade');
            $table->integer('day_of_week');
            $table->time('open_from');
            $table->time('open_to');
            $table->boolean('is_closed')->default(false);
            $table->boolean('exception')->default(false);
            $table->date('exception_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('opening_hours');
    }
};
