<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('new_products', function (Blueprint $table) {
            $table->id();
            $table->string("CORP");
            $table->string("PRODUCT_NAME");
            $table->string("PRODUCT_ID");
            $table->string("DESCRIPTION");
            $table->string("CODE_PROV_O_ALT");
            $table->string("CATEGORY");
            $table->string("UM");
            $table->double("OH");
            $table->double("AVAILABLE");
            $table->string("GROUP_CODE");
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
