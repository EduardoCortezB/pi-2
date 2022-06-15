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
        Schema::create('table_candidats', function (Blueprint $table) {
            $table->id();
            $table->boolean('isCoursing');

            // $table->unsignedBigInteger('user_id');
            $table->foreignId('user_id')->references('id')->on('users')->onUpdate('no action')->onDelete('no action');

            // $table->unsignedBigInteger('level_id');
            $table->foreignId('level_id')->references('id')->on('table_levels')->onUpdate('no action')->onDelete('no action');

            // $table->unsignedBigInteger('class_time_id');
            $table->foreignId('class_time_id')->references('id')->on('table_class_times')->onUpdate('no action')->onDelete('no action');

            // $table->unsignedBigInteger('career_id');
            $table->foreignId('career_id')->references('id')->on('table_careers')->onUpdate('no action')->onDelete('no action');        
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
        Schema::dropIfExists('table_candidats');
    }
};
