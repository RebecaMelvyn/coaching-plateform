<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('coaching_sessions', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->dateTime('start_time');
            $table->integer('duration'); // en minutes
            $table->string('location');
            $table->integer('max_participants');
            $table->foreignId('coach_id')->constrained('users');
            $table->foreignId('company_id')->constrained('companies');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('coaching_sessions');
    }
};
