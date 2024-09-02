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
        Schema::create('project_stages', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('membership_id');
            $table->unsignedInteger('type_id');
            $table->unsignedInteger('author_id')->nullable();
            $table->unsignedInteger('entry_count')->default(0);
            $table->boolean('complete')->default(false);
            $table->boolean('active');
            $table->boolean('needs_update')->default(false);
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
        Schema::dropIfExists('project_stages');
    }
};
