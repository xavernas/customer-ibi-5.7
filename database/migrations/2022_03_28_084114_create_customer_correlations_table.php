<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerCorrelationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    // Used for defining which customer data is used in one region
    
    public function up()
    {
        Schema::create('customer_correlations', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('customers_id');
            $table->foreign('customers_id')->references('id')->on('customers');
            $table->unsignedInteger('region_id');
            $table->foreign('region_id')->references('id')->on('regions');
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
        Schema::dropIfExists('customer_correlations');
    }
}
