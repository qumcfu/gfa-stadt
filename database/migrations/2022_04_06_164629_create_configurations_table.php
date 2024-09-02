<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConfigurationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('configurations', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id');
            $table->boolean('chart_active')->default(false);
            $table->string('chart_type')->default('bar');
            $table->string('chart_size')->default('default');
            $table->string('value_type')->default('mean');
            $table->unsignedInteger('screening_mode')->default(0);
            $table->string('interpolation_mode')->default('default');
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
        Schema::dropIfExists('configurations');
    }
}
