<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
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
            $table->string('RegisteredIP')->nullable();
            $table->string('ProfilePicture')->nullable();
            $table->enum('Active',['Y','N'])->default('N');
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
