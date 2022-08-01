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
        Schema::table('period', function (Blueprint $table) {
            $table->foreignId('language_id')->nullOnDelete()->nullable()->references('id')->on('languages')->onUpdate('cascade')->onDelete('cascade')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('period', function (Blueprint $table) {
            //
        });
    }
};
