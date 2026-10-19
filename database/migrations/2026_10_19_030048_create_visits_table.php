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
        Schema::create('visits', function (Blueprint $t) {
            $t->id();
            $t->string('type', 10);                 // view | event
            $t->string('event', 40)->nullable();
            $t->string('visitor', 32)->index();     // hash harian, bukan IP
            $t->string('referrer', 150)->nullable();
            $t->string('utm_source', 80)->nullable();
            $t->string('utm_medium', 80)->nullable();
            $t->string('utm_campaign', 80)->nullable();
            $t->string('device', 10);
            $t->string('browser', 30);
            $t->string('os', 30);
            $t->string('country', 2)->nullable();
            $t->timestamp('created_at')->nullable();
            $t->index(['type', 'created_at']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visits');
    }
};
