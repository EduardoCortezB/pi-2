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
        Schema::create('table_payments', function (Blueprint $table) {
            $table->id();
            // $table->string('path_pdf')->unique();

            $table->boolean('is_valid')->default(false);

            // user to payments
            $table->unsignedBigInteger('id_user');
            $table->foreignId('id_user')->references('id')->on('users')->onDelete('no action')->onUpdate('no action');
            
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
        Schema::dropIfExists('table_payments');
    }
};
