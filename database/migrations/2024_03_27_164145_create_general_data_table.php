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
        Schema::create('general_data', function (Blueprint $table) {
            $table->id();
            $table->enum('gender', ['M', 'Z']);
            $table->enum('status', ['B', 'S']);
            $table->enum('avg_rating', ['6-7', '7-8', '8-9', '9-10']);
            $table->enum('attendance', ['retko', 'povremeno', 'cesto', 'redovno']);
            $table->unsignedBigInteger('survey_id');

            $table->foreign('survey_id')->references('id')->on('surveys');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('general_data');
    }
};
