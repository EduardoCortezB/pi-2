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
            $table->foreignId('language_id')->nullOnDelete()->nullable()->references('id')->on('languages')->onUpdate('no action')->onDelete('no action')->constrained();

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
