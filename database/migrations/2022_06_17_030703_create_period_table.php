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
        Schema::create('period', function (Blueprint $table) {
            $table->id();
            $table->string('groupName');
            $table->string('start-date');
            $table->string('end-date');
            $table->boolean('isActive');
            $table->string('year');
            
            // relationship to level
            $table->foreignId('id_level')->references('id')->on('table_levels')->onDelete('cascade')->onUpdate('cascade');
            // relationship to class time
            $table->foreignId('id_class_time')->references('id')->on('table_class_times')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('period');
    }
};
