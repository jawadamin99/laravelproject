<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillingAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('billing_addresses', function (Blueprint $table) {
            $table->bigIncrements('ID');
            $table->bigInteger('UserID');
            $table->string('BillingTitle')->nullable();
            $table->string('BillingFirstName')->nullable();
            $table->string('BillingLastName')->nullable();
            $table->string('BillingCompanyName')->nullable();
            $table->string('BillingEmail')->nullable();
            $table->string('BillingAddress1')->nullable();
            $table->string('BillingAddress2')->nullable();
            $table->string('BillingTownCity')->nullable();
            $table->string('BillingCountyState')->nullable();
            $table->string('BillingPostCode')->nullable();
            $table->string('BillingCountry')->nullable();
            $table->string('BillingMobile')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('billing_addresses');
    }
}
