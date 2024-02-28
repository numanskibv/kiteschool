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

        Schema::create('cal_cources', function (Blueprint $table) {
            $table->id();
            $table->dateTime('book_date');
            $table->foreignId('client_id')->constrained('users');
            $table->foreignId('instructor_id')->constrained('users');
            $table->foreignId('course_id')->constrained();
            $table->foreignId('location_id')->constrained();
            $table->time('start_time');
            $table->time('end_time');
            $table->enum('status', ['open', 'booked', 'canceled']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cal_cources');
    }
};
