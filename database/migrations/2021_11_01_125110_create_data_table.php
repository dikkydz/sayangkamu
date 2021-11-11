<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('registration_number');
            $table->string('author');
            $table->text('address');
            $table->string('model');
            $table->string('type');
            $table->string('production_year');
            $table->string('silinder');
            $table->string('chassis_number');
            $table->string('engine_number');
            $table->string('bpkb_number');
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
        Schema::dropIfExists('data');
    }
}
