<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrivilegesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('privileges', function (Blueprint $table) {
            $table->id();
            $table->string('shortname');
            $table->string('name');
            $table->string('description');
            $table->timestamps();
        });

        DB::table('privileges')->insert([
            array(
                'shortname' => 'access',
                'name' => 'Access',
                'description' => 'Access section'
            ),
            array(
                'shortname' => 'create',
                'name' => 'Create',
                'description' => 'Create new entry'
             ),
            array(
                'shortname' => 'edit',
                'name' => 'Edit',
                'description' => 'Edit existing entry'
            ),
            array(
                'shortname' => 'delete',
                'name' => 'Delete',
                'description' => 'Delete entry'
            ),
            array(
                'shortname' => 'disable',
                'name' => 'Disable',
                'description' => 'Disable and enable entries'
            ),
            array(
                'shortname' => 'export',
                'name' => 'Export',
                'description' => 'Export data'
            ),
            array(
                'shortname' => 'access-other',
                'name' => 'Access questionnaires from other users',
                'description' => '...'
            ),
            array(
                'shortname' => 'edit-other',
                'name' => 'Edit questionnaires from other users',
                'description' => '...'
            )
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('privileges');
    }
}
