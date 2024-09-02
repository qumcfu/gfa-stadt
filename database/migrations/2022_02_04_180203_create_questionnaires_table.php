<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionnairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questionnaires', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('type_id')->default(1);
            $table->unsignedInteger('screening_id')->nullable();
            $table->unsignedInteger('order_id');
            $table->string('name');
            $table->text('description')->nullable();
            $table->unsignedInteger('icon_id')->nullable();
            $table->unsignedInteger('color_id')->nullable();
            $table->unsignedInteger('stage_order_id')->default(0);
            $table->unsignedInteger('author_id');
            $table->unsignedInteger('editor_id')->nullable();
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
        Schema::dropIfExists('questionnaires');
    }
}
