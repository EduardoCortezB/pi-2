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
        Schema::table('table_payments', function (Blueprint $table) {
            //
            $table->foreignId('idPath')->references('id')->on('pdf_payments')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('table_payments', function (Blueprint $table) {
            //
            $table->foreignId('idPath')->references('id')->on('pdf_payments')->onDelete('cascade')->onUpdate('cascade');
        });
    }
};
