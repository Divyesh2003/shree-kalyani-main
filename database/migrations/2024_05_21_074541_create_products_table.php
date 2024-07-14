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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('item_type')->nullable();
            $table->foreign('item_type')->references('id')->on('categories')->onDelete('cascade');
            $table->string('name');
            $table->string('slug');
            $table->text('description')->nullable();
            $table->text('price')->nullable();
            $table->text('supplier_code')->nullable();
           
            $table->text('item_code')->nullable();
            $table->text('hsn_code')->nullable();
            $table->text('image')->nullable();
            $table->text('gallery')->nullable();
            $table->text('video')->nullable();
            $table->text('image_code')->nullable();  
            $table->text('design_code')->nullable();  
            $table->text('febric')->nullable();  
            $table->text('base_color')->nullable();  
            $table->text('compitation_color')->nullable();  
            $table->text('material_composition')->nullable();  
            $table->text('length')->nullable();  
            $table->text('blouse')->nullable();  
            $table->text('blouse_color')->nullable();  
            $table->text('blouse_material')->nullable();  
            $table->text('blouse_work')->nullable();  
            $table->text('chuni')->nullable();  
            $table->text('chuni_color')->nullable();  
            $table->text('chuni_material')->nullable();  
            $table->text('chuni_work')->nullable();  
            $table->text('decdoration')->nullable();  
            $table->text('extra_work')->nullable();  
            $table->text('irate')->nullable();  
            $table->text('rate')->nullable();  
            $table->text('discount')->nullable();  
            $table->text('patterns')->nullable();  
            $table->text('occasion_type')->nullable();  
            $table->text('washing_instruction')->nullable();  
            $table->text('item_weight')->nullable();  
            $table->text('weave_type')->nullable();  
            $table->string('meta_title')->nullable();
            $table->text('meta_descipriton')->nullable();   
            $table->string('meta_keyword')->nullable();
            $table->string('arraival')->nullable();
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
        Schema::dropIfExists('products');
    }
};
