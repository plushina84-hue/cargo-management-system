<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cargos', function (Blueprint $table) {

            $table->id();

            $table->string('tracking_number')->unique();

            // Relationship with users table
            $table->foreignId('user_id')
                  ->constrained()
                  ->cascadeOnDelete();

            $table->string('origin');

            $table->string('destination');

            $table->integer('weight');

            $table->string('cargo_type');

            $table->string('status')
                  ->default('pending');

            $table->text('description')
                  ->nullable();

            $table->timestamps();

        });
    }


    public function down(): void
    {
        Schema::dropIfExists('cargos');
    }
};