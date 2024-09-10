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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('title', 50)->unique(); // ('Név', hossz)
            $table->longText('description');
            $table->date('end_date')->default('2024-09-10'); // ('YYYY-MM-DD')
            $table->boolean('status')->default(0); // Nincs kész: 0 - Kész van: 1
            $table->foreignId('user_id')->references('id')->on('users'); // Itt így fogják hívni a mezőt, ott hogy hívják, melyik táblával...
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
