<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertiesFeaturesTable extends Migration
{
    const TABLE = 'properties_features';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(self::TABLE, function (Blueprint $table) {
            $table->increments('id');
            $table->integer('property_id',false, true)->index();
            $table->string('reference', 10)->index();
            $table->integer('bedrooms');
            $table->integer('bathrooms');
            $table->boolean('private_pool');
            $table->boolean('community_pool');
            $table->boolean('garden');
            $table->boolean('garaje');
            $table->integer('price');
            $table->double('built_area', 6,2);
            $table->double('land_area', 8,2);
            $table->timestamps();

            $table->foreign("property_id")
                ->references("id")
                ->on("properties")
                ->onUpdate('cascade')
                ->onDelete('cascade');
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
