<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSubtotalIvaAndTotalColumnsToDispatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dispatches', function (Blueprint $table) {
            $table->unsignedDecimal('subtotal', 16, 2)->after('status');
            $table->unsignedDecimal('iva', 16, 2)->after('subtotal');
            $table->unsignedDecimal('total', 16, 2)->after('iva');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dispatches', function (Blueprint $table) {
            $table->dropColumn('subtotal');
            $table->dropColumn('iva');
            $table->dropColumn('total');
        });
    }
}
