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
        Schema::create('effects', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('content_id');
            $table->unsignedInteger('effect_type_id');
            $table->unsignedInteger('author_id');
            $table->unsignedInteger('editor_id')->nullable();
            $table->integer('size_y')->default(1);
            $table->integer('size_n')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('effects');
    }
};
