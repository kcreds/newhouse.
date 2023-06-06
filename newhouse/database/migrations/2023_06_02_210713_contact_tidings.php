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
        Schema::create('contact_tidings', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('immovables')->nullable();
            $table->string('immovablesSlug')->nullable();
            $table->text('message');
            $table->boolean('isread');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_tidings');
    }
};
