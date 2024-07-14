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
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            $table->date('date')->nullable();
            $table->date('due_date')->nullable();
            $table->string('vendor_name')->nullable();
            $table->string('vendor_address')->nullable();
            $table->string('vendor_phone')->nullable();
            $table->string('vendor_email')->nullable();
            $table->string('item_count')->nullable();
            $table->string('sub_totals')->nullable();
            $table->string('tax')->nullable();
            $table->string('total')->nullable();
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
        Schema::dropIfExists('purchases');
    }
};
