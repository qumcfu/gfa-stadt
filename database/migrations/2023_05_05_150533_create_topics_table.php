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
        Schema::create('topics', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('questionnaire_id')->nullable();
            $table->unsignedInteger('topic_id')->nullable();
            $table->unsignedInteger('origin_id')->nullable();
            $table->unsignedInteger('author_id');
            $table->unsignedInteger('editor_id')->nullable();
            $table->string('name');
            $table->string('description')->nullable();
            $table->text('notes')->nullable();
            $table->string('type')->default('default');
            $table->boolean('draw_arrow')->default(false);
            $table->unsignedInteger('width')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('topics');
    }
};
