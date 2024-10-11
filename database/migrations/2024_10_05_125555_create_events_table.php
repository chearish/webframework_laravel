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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('venue');
            $table->date('date');
            $table->time('start_time');
            $table->text('description');
            $table->string('booking_url')->nullable();
            $table->string('tags');
            $table->foreignId('organizer_events_id')->constrained('organizer_events')->onDelete('cascade');
            $table->foreignId('category_events_id')->constrained('category_events')->onDelete('cascade');

            // $table->foreign('organizer_event_id')
            //       ->references('id')
            //       ->on('organizer_events')->onDelete('cascade');
            // $table->foreign('category_event_id')
            //       ->references('id')
            //       ->on('category_events')->onDelete('cascade');
            $table->integer('active')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
