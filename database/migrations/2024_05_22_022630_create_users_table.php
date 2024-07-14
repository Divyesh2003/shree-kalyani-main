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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('mobile');
            $table->string('email');
            $table->string('bank_details')->nullable();
            $table->string('gst')->nullable();
            $table->string('pan')->nullable();
            $table->string('aadhar')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->string('addaress')->nullable();
            $table->string('company_name')->nullable();
            $table->string('pincode')->nullable();
            $table->string('password')->nullable();
            $table->string('role')->nullable();
            $table->string('price')->nullable();
            $table->string('image')->nullable();
            $table->enum('status', ['A','D'])->default('A');
            $table->string('email_stamp')->nullabel();
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
        Schema::dropIfExists('users');
    }
};
