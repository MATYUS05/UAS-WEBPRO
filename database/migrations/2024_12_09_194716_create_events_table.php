<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->date('date');
            $table->time('time');
            $table->time('time_end');
            $table->string('location');
            $table->unsignedBigInteger('class_id');
            $table->unsignedBigInteger('kaka_id');
            $table->timestamps();

            // Foreign keys
            $table->foreign('class_id')->references('id')->on('class_categories')->onDelete('cascade');
            $table->foreign('kaka_id')->references('id')->on('users')->onDelete('cascade');
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
