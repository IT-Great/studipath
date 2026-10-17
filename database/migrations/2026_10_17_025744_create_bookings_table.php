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
        Schema::create('bookings', function (Blueprint $t) {
            $t->id();
            $t->string('name', 120);
            $t->string('email', 150);
            $t->string('whatsapp', 30);
            $t->string('city', 100);
            $t->string('role', 100);
            $t->string('grade', 50);
            $t->string('school', 150);
            $t->string('curriculum', 100);
            $t->json('topics');
            $t->string('country', 150);
            $t->string('major', 150)->nullable();
            $t->json('start_year');
            $t->text('question');
            $t->string('mode', 30);
            $t->json('days');
            $t->json('times');
            $t->string('source', 150);
            $t->string('status', 20)->default('new')->index();
            $t->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
