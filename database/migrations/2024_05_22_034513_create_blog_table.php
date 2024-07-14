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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('item_type')->nullable();
            $table->foreign('item_type')->references('id')->on('blog_categories')->onDelete('cascade');
            $table->string('name');
            $table->string('slug');
            $table->string('image');
            $table->text('description')->nullable();
            $table->string('meta_title')->nullable();
            $table->text('meta_descipriton')->nullable();   
            $table->string('meta_keyword')->nullable();
            $table->enum('status', ['A','D'])->default('A');
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
        Schema::dropIfExists('blogs');
    }
};
