<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contents', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('questionnaire_id');
            $table->unsignedInteger('order_id')->default(0);
            $table->unsignedInteger('type_id')->default(0);
            $table->unsignedInteger('screening_id')->nullable();
            $table->unsignedInteger('priority')->default(3);
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
        Schema::dropIfExists('contents');
    }
}
