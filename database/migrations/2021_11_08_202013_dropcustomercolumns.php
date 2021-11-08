<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Dropcustomercolumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('customers', function (Blueprint $table) {
            $table->dropColumn('BillingTitle');
            $table->dropColumn('BillingCompanyName');
            $table->dropColumn('BillingAddress1');
            $table->dropColumn('BillingAddress2');
            $table->dropColumn('BillingTownCity');
            $table->dropColumn('BillingCountyState');
            $table->dropColumn('BillingPostcode');
            $table->dropColumn('BillingCountry');
            $table->dropColumn('DeliveryTitle');
            $table->dropColumn('DeliveryFirstName');
            $table->dropColumn('DeliveryLastName');
            $table->dropColumn('DeliveryCompanyName');
            $table->dropColumn('DeliveryEmail');
            $table->dropColumn('DeliveryAddress1');
            $table->dropColumn('DeliveryAddress2');
            $table->dropColumn('DeliveryTownCity');
            $table->dropColumn('DeliveryCountyState');
            $table->dropColumn('DeliveryCountry');
            $table->dropColumn('DeliveryMobile');
            $table->string('ProfilePicture')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
