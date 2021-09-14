<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDesksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('desks')) {
            Schema::create('desks', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('room_id')->unsigned();
                $table->foreign('room_id')
                    ->references('id')->on('rooms')
                    ->onDelete('cascade');
                $table->double('price');
                $table->double('size');
                $table->string('position');
                $table->boolean('is_taken')->default(0);
                $table->time('paid_time')->default(0);
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('desks');
    }
}
