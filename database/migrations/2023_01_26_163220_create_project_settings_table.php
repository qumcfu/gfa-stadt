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
        Schema::create('project_settings', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('project_id');
            $table->float('mean_positive_th')->default(2.0);
            $table->float('mean_negative_th')->default(1.0);
            $table->float('mean_potential_th')->default(1.0);
            $table->unsignedInteger('max_positive_th')->default(4);
            $table->unsignedInteger('max_negative_th')->default(3);
            $table->unsignedInteger('max_potential_th')->default(1);
            $table->unsignedInteger('min_met_conditions')->default(1);
            $table->float('mean_pos_effects_th')->default(5.0);
            $table->float('mean_neg_effects_th')->default(1.0);
            $table->unsignedInteger('max_pos_effects_th')->default(10);
            $table->unsignedInteger('max_neg_effects_th')->default(5);
            $table->string('operator')->default('>=');
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
        Schema::dropIfExists('project_settings');
    }
};
