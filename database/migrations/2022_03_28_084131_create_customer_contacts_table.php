<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    // Show the sales of 
    public function up()
    {
        Schema::create('customer_spending', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('customers_id');
            $table->foreign('customers_id')->references('id')->on('customers');
            $table->unsignedInteger('SO_reference')->nullable();
            $table->string('phone_number');
            $table->string('adress');
            $table->unsignedInteger('sales_amount');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->nullable()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer_contacts');
    }
}
