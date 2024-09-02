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
        Schema::create('references', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('questionnaire_id');
            $table->unsignedInteger('index');
            $table->string('author')->nullable();
            $table->string('title')->nullable();
            $table->string('journal')->nullable();
            $table->string('volume')->nullable();
            $table->string('issue')->nullable();
            $table->string('page')->nullable();
            $table->string('editor')->nullable();
            $table->string('book')->nullable();
            $table->string('publisher')->nullable();
            $table->string('year')->nullable();
            $table->string('url')->nullable();
            $table->string('doi')->nullable();
            $table->string('accessed')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('references');
    }
};
