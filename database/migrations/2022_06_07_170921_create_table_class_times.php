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
        Schema::create('table_class_times', function (Blueprint $table) {
            $table->id();
            $table->stgring('start_time');
            $table->stgring('end_time');
            $table->stgring('start_date');
            $table->stgring('end_date');
            $table->boolean('isActive');
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
        Schema::dropIfExists('table_class_times');
    }
};
