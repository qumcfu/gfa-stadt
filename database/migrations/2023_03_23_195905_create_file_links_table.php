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
        Schema::create('file_links', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('project_id');
            $table->unsignedInteger('file_id');
            $table->boolean('default')->default(false);
            $table->unsignedInteger('author_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('file_links');
    }
};
