<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->bigIncrements('UserID');
            $table->tinyInteger('UserTypeID')->default(14);
            $table->string('UserName')->nullable();
            $table->string('UserPassword');
            $table->string('UserEmail')->unique();
            $table->string('BillingTitle')->nullable();
            $table->string('BillingFirstName')->nullable();
            $table->string('BillingLastName')->nullable();
            $table->string('BillingCompanyName')->nullable();
            $table->string('BillingAddress1')->nullable();
            $table->string('BillingAddress2')->nullable();
            $table->string('BillingTownCity')->nullable();
            $table->string('BillingCountyState')->nullable();
            $table->string('BillingPostcode')->nullable();
            $table->string('BillingCountry')->nullable();
            $table->string('BillingMobile');
            $table->string('DeliveryTitle')->nullable();
            $table->string('DeliveryFirstName')->nullable();
            $table->string('DeliveryLastName')->nullable();
            $table->string('DeliveryCompanyName')->nullable();
            $table->string('DeliveryEmail')->nullable();
            $table->string('DeliveryAddress1')->nullable();
            $table->string('DeliveryAddress2')->nullable();
            $table->string('DeliveryTownCity')->nullable();
            $table->string('DeliveryCountyState')->nullable();
            $table->string('DeliveryCountry')->nullable();
            $table->string('DeliveryMobile')->nullable();
            $table->string('RegisteredIP')->nullable();
            $table->enum('Active',['Y','N'])->default('N');
            $table->rememberToken();
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
        Schema::dropIfExists('customers');
    }
}
