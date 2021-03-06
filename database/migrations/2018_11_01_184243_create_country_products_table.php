<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCountryProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('country_products', function (Blueprint $table) {
            $table->string('country_id');
            $table->string('producible_id');
            $table->string('producible_type' , 64);
            $table->primary(['country_id' , 'producible_id' ,'producible_type'] ,'primary_key');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('country_products');
    }
}
