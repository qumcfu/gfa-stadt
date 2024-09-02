<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('order_id');
            $table->unsignedInteger('color_id')->nullable();
            $table->string('name');
            $table->text('type')->nullable();
            $table->text('stage')->nullable();
            $table->text('change')->nullable();
            $table->string('enrollment_key');
            $table->unsignedInteger('app_mode')->default(2);
            $table->boolean('app_active')->default(false);
            $table->unsignedInteger('scr_count')->default(1);
            $table->unsignedInteger('app_count')->default(1);
            $table->unsignedInteger('scr_changes')->default(0);
            $table->unsignedInteger('app_changes')->default(0);
            $table->json('scr_data');
            $table->json('app_data');
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
        Schema::dropIfExists('projects');
    }
}
