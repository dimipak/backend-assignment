<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShipPositionsTable extends Migration
{
    protected string $tableName = 'ship_positions';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->id('ship_position_id');
            $table->bigInteger('mmsi');
            $table->boolean('status')->default(false);
            $table->integer('station_id');
            $table->decimal('speed', 10);
            $table->decimal('lon',10,7);
            $table->decimal('lat',10,7);
            $table->integer('course');
            $table->integer('heading');
            $table->string('rot')->nullable();
            $table->timestamp('timestamp');

            $table->index('mmsi', 'mmsi_idx', 'btree');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table($this->tableName, function (Blueprint $table) {
            $table->dropIndex('mmsi_idx');
        });

        Schema::dropIfExists('ship_positions');
    }
}
