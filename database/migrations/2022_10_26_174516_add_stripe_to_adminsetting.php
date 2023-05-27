<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStripeToAdminsetting extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('adminsetting', function (Blueprint $table) {
            $table->string('stripe_commission_percent');
            $table->string('stripe_commission_amount');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('adminsetting', function (Blueprint $table) {
            //
        });
    }
}
