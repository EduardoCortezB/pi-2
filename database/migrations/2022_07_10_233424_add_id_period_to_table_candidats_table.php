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
        Schema::table('table_candidats', function (Blueprint $table) {
            $table->foreignId('id_period')->nullOnDelete()->nullable()->references('id')->on('period')->onUpdate('cascade')->onDelete('cascade')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('table_candidats', function (Blueprint $table) {
            //
        });
    }
};
