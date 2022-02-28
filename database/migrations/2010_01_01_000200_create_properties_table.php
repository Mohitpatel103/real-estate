<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertiesTable extends Migration
{
    const TABLE = 'properties';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(self::TABLE, function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255);
            $table->text('description');
            $table->integer('agent_id',false, true)->index()->nullable();
            $table->integer('location_id', false, true)->index()->nullable();
            $table->integer('properties_type_id', false, true)->index()->nullable();

            $table->timestamps();

            $table->foreign("agent_id")
                ->references("id")
                ->on("agents")
                ->onUpdate('cascade')
                ->onDelete('set null');

            $table->foreign("location_id")
                ->references("id")
                ->on("locations")
                ->onUpdate('cascade')
                ->onDelete('set null');

            $table->foreign("properties_type_id")
                ->references("id")
                ->on("properties_types")
                ->onUpdate('cascade')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop(self::TABLE);
    }
}
