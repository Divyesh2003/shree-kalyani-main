<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('company_name')->nullable();
            $table->string('address_1')->nullable();
            $table->string('address_2')->nullable();
            $table->unsignedBigInteger('country')->nullable();
            $table->foreign('country')->references('id')->on('countries')->onDelete('cascade');
            $table->unsignedBigInteger('state')->nullable();
            $table->foreign('state')->references('id')->on('states')->onDelete('cascade');
            $table->string('city')->nullable();
            $table->string('pincode')->nullable();
            $table->string('shipping_first_name')->nullable();
            $table->string('shipping_last_name')->nullable();
            $table->string('shipping_email')->nullable();
            $table->string('shipping_phone')->nullable();
            $table->string('shipping_company')->nullable();
            $table->string('shipping_address_1')->nullable();
            $table->string('shipping_address_2')->nullable();
            $table->unsignedBigInteger('shipping_country')->nullable();
            $table->foreign('shipping_country')->references('id')->on('countries')->onDelete('cascade');
            $table->unsignedBigInteger('shipping_state')->nullable();
            $table->foreign('shipping_state')->references('id')->on('states')->onDelete('cascade');
            $table->string('shipping_city')->nullable();
            $table->string('shipping_pincode')->nullable();
            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->string('date')->nullable();
            $table->string('shipment_mode')->nullable();
            $table->string('shipment_note')->nullable();
            $table->string('shipment_status')->nullable();
            $table->string('season')->nullable();
            $table->string('payment_terms')->nullable();
            $table->string('year')->nullable();
            $table->string('total_qty')->nullable();
            $table->string('total_value')->nullable();
            $table->string('payment_mode')->nullable();
            $table->string('remark')->nullable();
            $table->enum('status', ['Approved','Pending','Canceled'])->default('Approved');
            $table->softDeletes();
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
        Schema::dropIfExists('orders');
    }
};
