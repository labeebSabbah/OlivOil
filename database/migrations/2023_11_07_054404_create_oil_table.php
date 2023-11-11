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
        Schema::create('oil', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string("phone", 10);
            $table->string("work_location");
            $table->integer("amount");
            $table->string("location");
            $table->date("created_at");
            $table->boolean('completed')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('oil');
    }
};
