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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employer_id')->constrained('users')->onDelete('cascade');
            $table->string('title');
            $table->string('category');
            $table->enum('type', ['Online', 'Offline']);
            $table->string('platform')->nullable();
            $table->string('location')->nullable();
            $table->string('time_estimate');
            $table->enum('expertise_level', ['Entry', 'Immediate', 'Expert']);
            $table->decimal('salary', 10, 2)->nullable();
            $table->text('description');
            $table->enum('status', ['open', 'ongoing', 'completed'])->default('open');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
