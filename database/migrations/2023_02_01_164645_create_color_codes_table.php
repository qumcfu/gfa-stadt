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
        Schema::create('color_codes', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('hex');
            $table->unsignedInteger('red')->default(0);
            $table->unsignedInteger('green')->default(0);
            $table->unsignedInteger('blue')->default(0);
            $table->unsignedInteger('alpha')->default(255);
            $table->boolean('is_bright')->nullable();
            $table->boolean('customizable')->default(true);
            $table->string('category');
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
        Schema::dropIfExists('color_codes');
    }
};
