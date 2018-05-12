<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterStatusColumnToPaymentsAndShippingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('payments', function (Blueprint $table) {
            $table->boolean('status')->default(1)->change();
        });

        Schema::table('shippings', function (Blueprint $table) {
            $table->boolean('status')->default(1)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('payments', function (Blueprint $table) {
            $table->boolean('status')->default(null)->change();
            
        });

        Schema::table('shippings', function (Blueprint $table) {
            $table->boolean('status')->default(null)->change();
            
        });
    }
}
