<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliveryAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delivery_addresses', function (Blueprint $table) {
            $table->bigIncrements('ID');
            $table->bigInteger('UserID');
            $table->string('DeliveryTitle')->nullable();
            $table->string('DeliveryFirstName')->nullable();
            $table->string('DeliveryLastName')->nullable();
            $table->string('DeliveryCompanyName')->nullable();
            $table->string('DeliveryEmail')->nullable();
            $table->string('DeliveryAddress1')->nullable();
            $table->string('DeliveryAddress2')->nullable();
            $table->string('DeliveryTownCity')->nullable();
            $table->string('DeliveryCountyState')->nullable();
            $table->string('DeliveryPostCode')->nullable();
            $table->string('DeliveryCountry')->nullable();
            $table->string('DeliveryMobile')->nullable();
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
        Schema::dropIfExists('delivery_addresses');
    }
}
