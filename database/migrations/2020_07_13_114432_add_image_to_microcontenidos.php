<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddImageToMicrocontenidos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('microcontenidos', function (Blueprint $table) {
            //



            $table->string('path')->after('texto')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('microcontenidos', function (Blueprint $table) {
            //

            $table->dropColumn('path');
        });
    }
}
