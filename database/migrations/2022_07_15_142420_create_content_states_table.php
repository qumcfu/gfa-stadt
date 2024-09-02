<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('content_states', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('original_id');
            $table->unsignedInteger('questionnaire_id');
            $table->unsignedInteger('order_id');
            $table->unsignedInteger('type_id');
            $table->unsignedInteger('screening_id')->nullable();
            $table->unsignedInteger('priority');
            $table->text('text');
            $table->string('short')->nullable();
            $table->text('info')->nullable();
            $table->unsignedInteger('author_id');
            $table->unsignedInteger('editor_id')->nullable();
            $table->json('data');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('content_states');
    }
};
