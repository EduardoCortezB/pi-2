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
            $table->dropForeign('table_candidats_career_id_foreign');
            $table->dropColumn("career_id");
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
            $table->foreignId('career_id')->references('id')->on('table_careers')->onUpdate('no action')->onDelete('no action');
        });
    }
};
