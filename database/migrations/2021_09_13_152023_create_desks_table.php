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
                $table->id();
                $table->foreignId('room_id')->constrained('rooms');
                $table->double('price');
                $table->double('size');
                $table->string('position');
                $table->boolean('is_taken')->default(false);
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
